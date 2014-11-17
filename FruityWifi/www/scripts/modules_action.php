<? 
/*
    Copyright (C) 2013-2014 xtr4nge [_AT_] gmail.com

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/ 
?>
<?

include "../login_check.php";
include "../config/config.php";
include "../functions.php";

//$bin_danger = "/usr/share/fruitywifi/bin/danger"; //DEPRECATED

// Checking POST & GET variables...
if ($regex == 1) {
    regex_standard($_GET["action"], "../msg.php", $regex_extra);
    regex_standard($_GET["module"], "../msg.php", $regex_extra);
}

$action = $_GET["action"];
$module = $_GET["module"];

if ($action == "install") {
    $exec = "git clone https://github.com/xtr4nge/module_$module.git /usr/share/fruitywifi/www/modules/$module";
    //exec("$bin_danger \"" . $exec . "\"" ); //DEPRECATED
    exec_fruitywifi($exec);
}

if ($action == "remove") {
    $exec = "apt-get -y remove fruitywifi-module-$module";
    exec_fruitywifi($exec);
    
    $exec = "rm -R /usr/share/fruitywifi/www/modules/$module";
    //exec("$bin_danger \"" . $exec . "\"" ); //DEPRECATED
    exec_fruitywifi($exec);
}

if ($action == "install-deb") {
    $exec = "apt-get -y install fruitywifi-module-$module";
    exec_fruitywifi($exec);
}

if ($action == "remove-deb") {
    $exec = "apt-get -y remove fruitywifi-module-$module";
    exec_fruitywifi($exec);
    
    $exec = "rm -R /usr/share/fruitywifi/www/modules/$module";
    exec_fruitywifi($exec);
}

if (isset($_GET["show"])) {
    header('Location: ../page_modules.php?show');
} else {
    header('Location: ../page_modules.php');
}

if (isset($_GET["show-deb"])) {
    header('Location: ../page_modules.php?show-deb');
} else {
    header('Location: ../page_modules.php');
}

?>