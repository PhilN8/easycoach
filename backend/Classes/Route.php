<?php


namespace Classes;

include_once "../../autoload.php";
// require __DIR__ . "\\..\\..\\autoload.php";

use Config\Database;
use Traits\Common;
use Classes\Model;

class Route extends Model
{
    // use Common;

    private int $id;
    private string $departure;
    private string $destination;
    private int $price;

    private const TABLE = 'tbl_routes';

    public function __construct($routeInfo = null)
    {
        parent::__construct(Route::TABLE);
        // if (!is_null($routeInfo)) {
        //     $this->departure = $routeInfo['departure'];
        //     $this->destination = $routeInfo['destination'];
        //     $this->price = $routeInfo['price'];
        // }
    }

    public function newRoute($departure, $destination, $cost)
    {

        if (!$this->search($departure, $destination)) {
            $new_route_sql = "INSERT INTO `{$this->table}`(`departure`, `destination`, `cost`)
                VALUES(?, ?, ?)";

            return $this->db
                ->upsert($new_route_sql, [
                    $this->clean($departure),
                    $this->clean($destination),
                    $cost
                ], true);
        } else {
            return FALSE;
        }
        // ->check();
    }

    private function clean(string $location)
    {
        return ucwords(strtolower(trim(stripslashes(htmlspecialchars($location)))));
    }

    // public function all()
    // {
    //     return $this->db;
    // }

    public function getAllRoutes()
    {
        $query = "SELECT * FROM {$this->table} WHERE is_deleted = ?";
        $routes = $this->db
            ->query($query, [0])
            ->all();

        return $routes;
    }

    public static function all()
    {
        return (new Route)->getAllRoutes();
    }

    public function updateCost($id, $newPrice)
    {
        $query = "UPDATE {$this->table} SET cost = ? WHERE route_id = ?";
        $result = $this->db->upsert($query, [
            intval($newPrice),
            intval($id)
        ]);
        // ->check();
        return $result > 0;
    }

    public static function update($id, $newPrice)
    {
        // return 
    }

    public static function find($id)
    {
    }

    public function getRoute($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE `route_id`= ?";
        $result = $this->db
            ->query($query, [$id])
            ->find();

        return $result;
    }

    public function checkIfRouteExists($id): bool
    {


        return false;
    }
    // public static function cost($id)
    // {
    //     $cost_sql = "SELECT `cost` FROM `tbl_routes` WHERE `route_id`=" . $route;

    // $cost = $conn->query($cost_sql)->fetch_assoc()['cost'];
    // }

    // public static int $cost = function ($id) {
    public function getCost($id)
    {
        $cost_sql = "SELECT `cost` FROM {$this->table} WHERE `route_id`= ?";
        $result = $this->db
            ->query($cost_sql, [$id])
            ->get();

        $cost = $result['cost'];

        return intval($cost) ?? 0;
    }

    public function search($departure, $destination)
    {
        // Receive string, convert to array
        $query = "SELECT * FROM `{$this->table}` WHERE `departure`=:departure AND `destination`=:destination";
        $result = $this->db->query($query, [
            "departure" => $this->clean($departure),
            "destination" => $this->clean($destination)
        ])->check();

        return $result;
    }

    public static function cost($id)
    {
        return (new Route)->getCost($id);
    }
}

$route = new Route();

// $route->all();

// dd($route->getCost(12));
// dd($route->updateCost('5', '1200'));
// dd($route->newRoute('Nakuru', 'Mandera', '1200'));
// dd($route->all());
// dd($route->search('Nairobi', 'Mombasa'));
// session_abort();
// dd(stream_resolve_include_path("../../autoload.php"));
// phpinfo();

// echo json_encode([
//     'message' => 2,
//     'routes' => Route::all()
// ]);
