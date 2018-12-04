<?php

Route::post('receiveTestResults', 'ILabAfrica\EquipmentInterface\EquipmentInterface@store');
Route::post('receiveTestResults/humastar', 'ILabAfrica\EquipmentInterface\EquipmentInterface@humastar');