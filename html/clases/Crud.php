<?php
class Crud
{
    private $manager;
    private $database;

    public function __construct() {
        // Initialize MongoDB Manager and database name
        $this->manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
        $this->database = "db_polideportivos";
    }

    // socios collection functions
    public function getSocios()
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "socios";

            $query = new MongoDB\Driver\Query([]);
            $socios = $manager->executeQuery("$database.$collection", $query);
            return $socios;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getSocio($id)
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "socios";

            $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
            $query = new MongoDB\Driver\Query($filter);

            $cursor = $manager->executeQuery("$database.$collection", $query);
            $socio = current($cursor->toArray());

            return $socio;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insertSocio($socio)
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "socios";

            $bulkWrite = new MongoDB\Driver\BulkWrite();
            $bulkWrite->insert($socio);

            $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

            $result = $manager->executeBulkWrite("$database.$collection", $bulkWrite, $writeConcern);

            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function deleteSocio($id)
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "socios";

            $bulkWrite = new MongoDB\Driver\BulkWrite();
            $bulkWrite->delete(['_id' => new MongoDB\BSON\ObjectId($id)]);

            $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

            $result = $manager->executeBulkWrite("$database.$collection", $bulkWrite, $writeConcern);

            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function updateSocio($id, $socio)
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "socios";

            $bulkWrite = new MongoDB\Driver\BulkWrite();
            $bulkWrite->update(['_id' => new MongoDB\BSON\ObjectId($id)], ['$set' => $socio]);

            $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

            $result = $manager->executeBulkWrite("$database.$collection", $bulkWrite, $writeConcern);

            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function mensajesCrud($mensaje)
    {
        $msg = '';

        if ($mensaje == 'insert') {
            $msg = 'swal("Excelente!", "Agregado con exito!", "success")';
        } else if ($mensaje == 'update') {
            $msg = 'swal("Excelente!", "Actualizado con exito!", "info")';
        } else if ($mensaje == 'delete') {
            $msg = 'swal("Excelente!", "Eliminado con exito!", "warning")';
        }

        return $msg;
    }

    // polideportivos collection functions

    public function getPolideportivos()
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "polideportivos";

            $query = new MongoDB\Driver\Query([]);
            $polideportivos = $manager->executeQuery("$database.$collection", $query);

            return $polideportivos;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getPolideportivo($id)
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "polideportivos";

            $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
            $query = new MongoDB\Driver\Query($filter);

            $cursor = $manager->executeQuery("$database.$collection", $query);
            $polideportivo = current($cursor->toArray());

            return $polideportivo;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insertPolideportivo($polideportivo)
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "polideportivos";

            $bulkWrite = new MongoDB\Driver\BulkWrite();
            $bulkWrite->insert($polideportivo);

            $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

            $result = $manager->executeBulkWrite("$database.$collection", $bulkWrite, $writeConcern);

            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function deletePolideportivo($id)
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "polideportivos";

            $bulkWrite = new MongoDB\Driver\BulkWrite();
            $bulkWrite->delete(['_id' => new MongoDB\BSON\ObjectId($id)]);

            $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

            $result = $manager->executeBulkWrite("$database.$collection", $bulkWrite, $writeConcern);

            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function updatePolideportivo($id, $polideportivo)
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "polideportivos";

            $bulkWrite = new MongoDB\Driver\BulkWrite();
            $bulkWrite->update(['_id' => new MongoDB\BSON\ObjectId($id)], ['$set' => $polideportivo]);

            $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

            $result = $manager->executeBulkWrite("$database.$collection", $bulkWrite, $writeConcern);

            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    // registroEntradas collection functions

    public function getEntradas()
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "registroEntradas";

            $query = new MongoDB\Driver\Query([]);
            $entradas = $manager->executeQuery("$database.$collection", $query);
            return $entradas;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getEntrada($id)
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "registroEntradas";

            $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
            $query = new MongoDB\Driver\Query($filter);

            $cursor = $manager->executeQuery("$database.$collection", $query);
            $entrada = current($cursor->toArray());

            return $entrada;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }    

    public function insertEntrada($entrada)
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "registroEntradas";

            $bulkWrite = new MongoDB\Driver\BulkWrite();
            $bulkWrite->insert($entrada);

            $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

            $result = $manager->executeBulkWrite("$database.$collection", $bulkWrite, $writeConcern);

            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    // functions for the query

    public function getSociosMasAcudenPolideportivo() {
        $pipeline = [
            ['$group' => ['_id' => '$idSocio', 'count' => ['$sum' => 1]]],
            ['$sort' => ['count' => -1]],
            ['$limit' => 1]
        ];

        $command = new MongoDB\Driver\Command([
            'aggregate' => 'registroEntrada',
            'pipeline' => $pipeline
        ]);

        $options = ['cursor' => []]; // Set 'cursor' option as an empty array

        $cursor = $this->manager->executeCommand($this->database, $command, $options);

        return $cursor->toArray();
    }

    // public function getSociosMasAcudenPolideportivo() {
    //     $pipeline = array(
    //         array(
    //             '$group' => array(
    //                 '_id' => '$idSocio',
    //                 'count' => array('$sum' => 1)
    //             )
    //         ),
    //         array(
    //             '$sort' => array('count' => -1)
    //         ),
    //         array(
    //             '$limit' => 5
    //         )
    //     );
    
    //     $result = $this->mongoDB->entradas->aggregate($pipeline);
    
    //     $socios = array();
    //     foreach ($result as $entry) {
    //         $socio = $this->mongoDB->socios->findOne(array('_id' => $entry['_id']));
    //         $socios[] = $socio;
    //     }
    
    //     return $socios;
    // }

    public function getSociosMasAcudenPorPolideportivo() {
        $pipeline = array(
            array(
                '$group' => array(
                    '_id' => array('idSocio' => '$idSocio', 'idPolideportivo' => '$idPolideportivo'),
                    'count' => array('$sum' => 1)
                )
            ),
            array(
                '$sort' => array('count' => -1)
            ),
            array(
                '$group' => array(
                    '_id' => '$_id.idPolideportivo',
                    'socios' => array('$push' => array('socio' => '$_id.idSocio', 'count' => '$count'))
                )
            )
        );
    
        $result = $this->mongoDB->entradas->aggregate($pipeline);
    
        $sociosPorPolideportivo = array();
        foreach ($result as $entry) {
            $polideportivo = $this->mongoDB->polideportivos->findOne(array('_id' => $entry['_id']));
    
            $socios = array();
            foreach ($entry['socios'] as $socioEntry) {
                $socio = $this->mongoDB->socios->findOne(array('_id' => $socioEntry['socio']));
                $socio['count'] = $socioEntry['count'];
                $socios[] = $socio;
            }
    
            $sociosPorPolideportivo[] = array('polideportivo' => $polideportivo, 'socios' => $socios);
        }
    
        return $sociosPorPolideportivo;
    }
    
    public function getMediaGenteSabadoPolideportivo() {
        $pipeline = array(
            array(
                '$match' => array('fechaHora' => array('$regex' => '^.*Saturday.*$'))
            ),
            array(
                '$group' => array(
                    '_id' => '$idPolideportivo',
                    'count' => array('$sum' => 1)
                )
            ),
            array(
                '$project' => array(
                    'polideportivo' => 1,
                    'media' => array('$avg' => '$count')
                )
            )
        );
    
        $result = $this->mongoDB->entradas->aggregate($pipeline);
    
        $mediaGenteSabadoPolideportivo = array();
        foreach ($result as $entry) {
            $polideportivo = $this->mongoDB->polideportivos->findOne(array('_id' => $entry['_id']));
            $entry['polideportivo'] = $polideportivo;
            $mediaGenteSabadoPolideportivo[] = $entry;
        }
    
        return $mediaGenteSabadoPolideportivo;
    }

    public function getSociosMenosCincoDiasMes() {
        $pipeline = array(
            array(
                '$group' => array(
                    '_id' => array('idSocio' => '$idSocio', 'month' => array('$month' => '$fechaHora')),
                    'count' => array('$sum' => 1)
                )
            ),
            array(
                '$match' => array('count' => array('$lt' => 5))
            ),
            array(
                '$group' => array(
                    '_id' => '$_id.idSocio',
                    'count' => array('$sum' => 1)
                )
            )
        );
    
        $result = $this->mongoDB->entradas->aggregate($pipeline);
    
        $sociosMenosCincoDiasMes = array();
        foreach ($result as $entry) {
            $socio = $this->mongoDB->socios->findOne(array('_id' => $entry['_id']));
            $entry['socio'] = $socio;
            $sociosMenosCincoDiasMes[] = $entry;
        }
    
        return $sociosMenosCincoDiasMes;
    }
    
    public function getEntradasSocioPolideportivo($socioId, $polideportivoId) {
        $query = array();
    
        if ($socioId !== '') {
            $query['idSocio'] = $socioId;
        }
    
        if ($polideportivoId !== '') {
            $query['idPolideportivo'] = $polideportivoId;
        }
    
        $entradas = $this->mongoDB->entradas->find($query);
    
        return $entradas;
    }
    
    

}

?>