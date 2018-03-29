<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    
    require 'vendor/autoload.php';
    require 'dbcon.php';
    $app=new \Slim\App;

    $app->get('/',function(Request $req,Response $res,Array $array)
    {
        return $res->withJson(viewPost());

        // return "Welcome to this site";
    });

    $app->post('/addPost',function(Request $req,Response $res){
        
        if(isTheseParametersAvailable(array('title','by','body')))
        {
            $key = $req->getParsedBody();
            
            $title=$key['title'];
            $by=$key['by'];
            $body=$key['body'];
            if(addPost($title,$by,$body))
            {
                $data=array(
                    'error'=>false,
                    'message'=>'new post added.'
                );
            }
            else
            {
                $data=array(
                    'error'=>true,
                    'message'=>'somthing worng with server'
                );
            }
            return $res->withJson($data);
        }


    });

    $app->run();

    function isTheseParametersAvailable($required_fields)
    {
        $error = false;
        $error_fields = "";
        $request_params = $_REQUEST;
        foreach ($required_fields as $field) {
            if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
                $error = true;
                $error_fields .= $field . ', ';
            }
        }
        if ($error) {
            $response = array();
            $response["error"] = true;
            $response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';
            echo json_encode($response);
            return false;
        }
        return true;
    }

    
?>