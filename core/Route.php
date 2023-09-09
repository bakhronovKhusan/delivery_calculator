<?
namespace Core;

class Route
{

  public $url;
  public $error = "";

  public function __construct(){
    $this->url = parse_url($_SERVER['REQUEST_URI']);
  }

  public function ADD($params) {
    foreach ($params as $key => $route) {
      if($this->url['path'] == $route[1]){
        if($_SERVER['REQUEST_METHOD']==$route[0]){
            $className = $route[2];
            $methodName = $route[3];
             echo call_user_func(array(new $className(), $methodName), $_REQUEST); return;
        }else{
            $this->error = 'wrong Method';
        }
      }else {
        $this->error = 'Not Found!';
      }
    }

    if(!empty($this->error)){
      echo $this->error;
    }
  }
}
