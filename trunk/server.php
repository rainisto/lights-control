<?php

error_reporting(0);

define("ZWAVE_HOST", "localhost");
define("ZWAVE_PORT", 6004);

class ZwaveServer {

    //put your code here
    private $socket;

    function __construct($host, $port) {
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($this->socket === false)
            echo "error";
        else {
            if (!socket_connect($this->socket, $host, $port)) {
                die("Error");
            }
        }
    }

    function read() {
        return socket_read($this->socket, 2048);
    }

    function send($data) {
        socket_write($this->socket, $data, strlen($data . chr(0)));
    }

    function close() {
        socket_close($this->socket);
    }

}

if (isset($_REQUEST["command"])) {
    switch ($_REQUEST["command"]) {
        case "rooms":
            $zwaveServer = new ZwaveServer(ZWAVE_HOST, ZWAVE_PORT);
            $zwaveServer->send("ALIST");
            $list = $zwaveServer->read();
            $list = substr($list, 0, strlen($list) - 1);
            $devicesList = explode("#", $list);
            $zones = array();
            foreach ($devicesList as $device) {
                $device = explode("~", $device);
                if ($device[3])
                    $zones[] = $device["3"];
            }
            $zones = array_unique($zones);
            $strZones = implode("~", $zones);
            echo $strZones;
            break;

        case "devices":
            $zwaveServer = new ZwaveServer(ZWAVE_HOST, ZWAVE_PORT);
            $zwaveServer->send("ALIST");
            $list = $zwaveServer->read();
            $list = substr($list, 0, strlen($list) - 1);
            //echo $list;
            $devicesList = explode("#", $list);
            //echo $devicesList;
            $devices = "";
            foreach ($devicesList as $device) {
                $device = explode("~", $device);
                if ($device[3] == null)
                    $device[3] = "Undefined";
                $devices .= $device[1] . "~" . $device[2] . "~" . $device[3] . "~" . $device[4] . "~" . $device[5] . "#";
            }

            $devices = substr($devices, 0, strlen($devices) - 1);
            echo $devices;

            $zwaveServer->close();

            break;

        case "control":
            if (isset($_REQUEST["type"])) {
                $zwaveServer = new ZwaveServer(ZWAVE_HOST, ZWAVE_PORT);
                switch ($_REQUEST["type"]) {
                    case ($_REQUEST["type"] == "binary" || $_REQUEST["type"] == "Binary Switch" || $_REQUEST["type"] == "Binary Power Switch"):
                        $zwaveServer->send("DEVICE~" . $_REQUEST["node"] . "~" . $_REQUEST["level"] . "~Binary Switch");
                        break;

                    case ($_REQUEST["type"] == "Multilevel Power Switch" || $_REQUEST["type"] == "Multilevel Switch"):
                        $zwaveServer->send("DEVICE~" . $_REQUEST["node"] . "~" . $_REQUEST["level"] . "~Multilevel Power Switch");
                        break;
                }
                echo $zwaveServer->read();
            } else {
                echo "Type not specified!";
            }
            break;
        case "setnode":
            if (isset($_REQUEST["node"]) && isset($_REQUEST["name"]) && isset($_REQUEST["zone"])) {
                $zwaveServer = new ZwaveServer(ZWAVE_HOST, ZWAVE_PORT);
                $msg = "SETNODE~" . $_REQUEST["node"] . "~" . $_REQUEST["name"] . "~" . $_REQUEST["zone"];
                $zwaveServer->send($msg);                
            }
        default:
            echo "undefined";
            break;
    }
}
else
    echo "Nothing to process!";
?>
