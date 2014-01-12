<?php
#Hypothèse d'utilisation
\Apibeta\Configuration::setCleAPI('MaCle');
#Identification de l'utilisateur
\Apibeta\Members::postAuth('MonLogin', 'MonPassword');
#Ma liste d'épisodes à regarder
var_dump(\Apibeta\Episodes::getList());