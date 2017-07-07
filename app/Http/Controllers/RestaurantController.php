<?php
/**
 * Created by PhpStorm.
 * User: andreiiorga
 * Date: 01/07/2017
 * Time: 18:58
 */

namespace App\Http\Controllers;

use App\Order;
use App\RestaurantTable;
use App\Task;
use App\Waiters;
use App\Zone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Helper\Table;


class RestaurantController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function categories()
    {
        $categories = Category::all();
        return view('menu.category_view', ['categories' => $categories]);
    }

    public function categoryDetails($id)
    {
        $category = Category::find($id);
        return view('menu.category_details', ['category' => $category]);
    }

    public function categoryUpdate(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->imageUrl = $request->input('imageUrl');
        $category->save();

        return redirect()->route('categories');
    }

    public function getCategoryDelete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }

    public function addCategory(Request $request)
    {
        $category = new Category([
            'name' => $request->input('name'),
            'imageUrl' => $request->input('imageUrl')
        ]);
        $category->save();
        return redirect()->route('categories');
    }

    public function getAddCategory()
    {
        return view('menu.category_get_add');
    }

    public function products()
    {
        $products = Product::all();
        return view('menu.products_view', ['products' => $products]);
    }

    public function productDetails($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('menu.product_details', ['product' => $product, 'categories' => $categories]);
    }

    public function productUpdate(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->imageUrl = $request->input('imageUrl');
        $product->longDescription = $request->input('longDescription');
        $product->shortDescription = $request->input('shortDescription');
        $product->price = $request->input('price');
        $product->weight = $request->input('weight');
        if ($request->input("needsPreparation") == null) {
            $product->needsPreparation = false;
        } else {
            $product->needsPreparation = true;
        }
        $product->category = $request->input('category');

        $product->save();

        return redirect()->route('products');
    }

    public function getAddProduct()
    {
        $categories = Category::all();
        return view('menu.product_get_add', ['categories' => $categories]);
    }

    public function addProduct(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->imageUrl = $request->input('imageUrl');
        $product->longDescription = $request->input('longDescription');
        $product->shortDescription = $request->input('shortDescription');
        $product->price = $request->input('price');
        $product->weight = $request->input('weight');
        if ($request->input("needsPreparation") == null) {
            $product->needsPreparation = false;
        } else {
            $product->needsPreparation = true;
        }
        $product->category = $request->input('category');


        $product->save();

        return redirect()->route('products');
    }

    public function getProductDelete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }

    public function waiters()
    {
        $waiters = Waiters::all();
        return view('menu.waiters_view', ['waiters' => $waiters]);
    }

    public function waiterDetails($id)
    {
        $totalTime = 0;
        $todayTasksNo = 0;
        $waiter = Waiters::find($id);
        $zones = Zone::all();
        $tasks = Task::where('waiterId', $waiter->id)->where('isDone', true)->get();
        foreach ($tasks as $task) {
            $startTime = Carbon::parse($task->onCreate);
            $finishTime = Carbon::parse($task->onUpdate);

            $totalDuration = $finishTime->diffInSeconds($startTime);

            $totalTime += $totalDuration;

        }
        if ($tasks->count() != 0) {
            $totalTime = $totalTime / $tasks->count() / 60;
            number_format((float)$totalTime, 2, '.', '');
            $waiterTasks = Task::where('waiterId', $waiter->id)->where('isDone', true);
            $todayTasksNo = $waiterTasks->whereDate('onCreate', DB::raw('CURDATE()'))->count();

        }

        return view('menu.waiter_details', ['waiter' => $waiter, 'zones' => $zones, 'totalTime' => number_format((float)$totalTime, 2, '.', ''), 'todayTasksNo' => $todayTasksNo, 'totalTasks' => $tasks->count()]);
    }

    public function waiterUpdate(Request $request, $id)
    {
        $waiter = Waiters::find($id);
        $waiter->name = $request->input('name');
        $waiter->username = $request->input('username');
        $waiter->password = $request->input('pin');

        $waiter->zoneId = $request->input('zone');

        $waiter->save();

        return redirect()->route('waiters');
    }

    public function getWaiterDelete($id)
    {
        $waiter = Waiters::find($id);
        $waiter->delete();
        return redirect()->back();
    }

    public function getAddWaiter(Request $request)
    {
        $zones = Zone::all();
        return view('menu.waiter_get_add', ['zones' => $zones]);
    }

    public function addWaiter(Request $request)
    {
        $waiter = new Waiters();
        $waiter->name = $request->input('name');
        $waiter->username = $request->input('username');
        $waiter->password = $request->input('pin');

        $waiter->zoneId = $request->input('zone');

        $waiter->save();

        return redirect()->route('waiters');
    }

    public function getRestaurantManagement()
    {
        return view('menu.manage_restaurant');
    }

    public function getManageTables()
    {
        $tables = RestaurantTable::all();
        $zones = Zone::all();
        return view('menu.tables_view', ['tables' => $tables, 'zones' => $zones]);
    }

    public function getEditTable($id)
    {
        $table = RestaurantTable::find($id);
        $zones = Zone::all();
        return view('menu.table_details', ['table' => $table, 'zones' => $zones]);
    }

    public function updateTable(Request $request)
    {
        $table = RestaurantTable::find($request->tableId);
        $table->tableNo = $request->tableNo;
        $table->zone = $request->zoneId;
        $table->tableZone = $request->zoneId;
        $table->tablePassword = $request->pin;

        $table->save();

        return 200;
    }

    public function addTable(Request $request)
    {
        $table = new RestaurantTable();
        $table->tableNo = $request->tableNo;
        $table->zone = $request->zoneId;
        $table->tableZone = $request->zoneId;
        $table->tablePassword = $request->pin;

        $table->save();

        return 200;
    }

    public function getTableDelete($id)
    {
        $table = RestaurantTable::find($id);
        $table->delete();
        return redirect()->back();
    }

    public function getManageZones()
    {
        $zones = Zone::all();
        return view('menu.zones_view', ['zones' => $zones]);
    }

    public function getZoneDelete($id)
    {
        $zone = Zone::find($id);
        $zone->delete();
        return redirect()->back();
    }

    public function addZone(Request $request)
    {
        $zone = new Zone();
        $zone->zone = $request->zoneNo;
        $zone->save();

        return 200;
    }

    public function getDashboard()
    {

        $results = array();
        for ($i = 1; $i < 8; $i++) {
            $totalIncomes = 0;
            if($i==1){
                $orders = Order::where('onCreate', '>=', Carbon::today())->get();
            }else{
                $orders = Order::whereDate(DB::raw('date(onCreate)'), Carbon::today()->subDay($i - 1))->get();
            }

            foreach ($orders as $currentOrder) {
                $totalIncomes += $currentOrder->price;
            }
            $results[] = $totalIncomes;
        }
       // dd(Carbon::today()->subDay(0));
        $resultsJson[] = [
            'day0' => $results[0],
            'day1' => $results[1],
            'day2' => $results[2],
            'day3' => $results[3],
            'day4' => $results[4],
            'day5' => $results[5],
            'day6' => $results[6]
        ];

        $todayIncomes = $results[0];
        $noOfTodayOrders = Order::whereDate(DB::raw('date(onCreate)'), Carbon::today())->count();

        return view('menu.dashboard', ['results' => json_encode($resultsJson), 'todayIncomes' => $todayIncomes, 'noOfTodayOrders' => $noOfTodayOrders]);
    }
}