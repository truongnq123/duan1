<?php
require_once "./app/common/db.php";
require_once "./app/common/lib.php";

callModel('categoryModels');
callModel('productModels');
callModel('vourcherModels');
callModel("newsModels");
callModel("commentModels");
callModel("displayModels");
callModel("orderModels");
callModel("addressModels");
callModel("accountModels");
callModel("favoriteModels");