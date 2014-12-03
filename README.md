# DATETIMER
## Description
This repository is meant to manipulation date of php.
## Usage
$date = new DateTimer('30-08-1992');
## EXAMPLE
```
$date->addYear(20, '-')->addHour(10);
$date->setFormat('d M Y');
echo $date->getDate();
echo $date->ageIs();
```