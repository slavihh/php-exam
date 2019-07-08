<?php


session_start();
spl_autoload_register();

$template = new \Core\Template();
$dataBinder = new \Core\DataBinder();
$dbInfo = parse_ini_file("Config/db.ini");
$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['pass']);
$db = new \Database\PDODatabase($pdo);
$userRepository = new \App\Repository\UserRepository($db, $dataBinder);
$offerRepository = new \App\Repository\Offer\OfferRepository($db, $dataBinder);
$roomRepository = new \App\Repository\Room\RoomRepository($db, $dataBinder);
$townRepository = new \App\Repository\Town\TownRepository($db, $dataBinder);
$encryptionService = new \App\Service\Encryption\EncryptionService();
$userService = new \App\Service\UserService($userRepository, $encryptionService);
$offerService = new \App\Service\Offer\OfferService($offerRepository);
$roomService = new \App\Service\Room\RoomService($roomRepository);
$townService = new \App\Service\Town\TownService($townRepository);
$userHttpHandler = new \App\Http\UserHttpHandler($template, $dataBinder, $userService);
$offerHttpHandler = new \App\Http\OfferHttpHandler($template, $dataBinder, $offerService, $roomService, $townService, $userService);
