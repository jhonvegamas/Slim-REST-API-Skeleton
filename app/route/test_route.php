<?php
use App\Model\TestModel;

$app->group('/test/', function () {

    $this->get('', function ($req, $res, $args) {
        $um = new TestModel();

        $res->write(
            json_encode($um->getAll(), JSON_UNESCAPED_UNICODE)
        );

        return $res;            
    });

    $this->get('{id}', function ($req, $res, $args) {
        $um = new TestModel();

        return $res            
            ->getBody()
            ->write(
                json_encode($um->get($args['id']), JSON_UNESCAPED_UNICODE)
            );
    });

    $this->post('', function ($req, $res) {
        $um = new TestModel();

        return $res           
            ->getBody()
            ->write(
                json_encode(
                    $um->insert(
                        $req->getParsedBody()
                    )
                    , JSON_UNESCAPED_UNICODE)
            );
    });


    $this->put('', function ($req, $res) {
        $um = new TestModel();
        return $res            
            ->getBody()
            ->write(
                json_encode(
                    $um->update(
                        $req->getParsedBody()
                    )
                    , JSON_UNESCAPED_UNICODE)
            );
    });

    $this->delete('{id}', function ($req, $res, $args) {
        $um = new TestModel();

        return $res            
            ->getBody()
            ->write(
                json_encode(
                    $um->delete($args['id'])
                    , JSON_UNESCAPED_UNICODE)
            );
    });   
});
