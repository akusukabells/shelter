<?php

require '../vendor/autoload.php';

use Kreait\Firebase\Factory;
use Google\Cloud\Storage\StorageClient;

$factory = (new Factory)
    ->withServiceAccount(__DIR__ . '/absensiadminsdknotejs.json')
    ->withDatabaseUri('https://absensi-33547-default-rtdb.firebaseio.com');

$keypathfile = __DIR__ . '/absensiadminsdknotejs.json';
$storage = new StorageClient([
    'keyFilePath' => $keypathfile,
    'projectId' => 'absensi-33547'
]);

$bucketURL = 'absensi-33547.appspot.com';

$bucket = $storage->bucket($bucketURL);
$database = $factory->createDatabase();
