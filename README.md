# jde shipping API integration SDK

Features:

- [x] Cost Calculation
  - [x] Delivery cost calculation by addresses
  - [x] Delivery cost calculation
  - [x] SMART delivery cost calculation (by city names)
- [x] Requests
  - [x] New delivery request
  - [x] List of requests
- [ ] Shipments
  - [ ] Receiving new shipment statuses
  - [ ] Shipment delivery status by waybill number
  - [ ] Simplified shipment delivery status by waybill number
  - [ ] Setting a delivery restriction on a shipment
- [ ] Services
  - [x] Receiving a list of service codes
  - [ ] Receiving information on shipment services
  - [ ] Receiving a package of documents
  - [ ] Receiving payment data for services
- [x] Geography
  - [x] Searching for terminals by KLADR
  - [x] Searching for cities by types
  - [x] Searching by terminal type
  - [x] Branch working hours
- [ ] Documents
  - [ ] Receiving documents
  - [ ] Receiving a list of document codes

## Installation

```bash
composer require StasPlov/jde-shipping
```

# How to use

```php
$jdeShipping = new JdeShipping();

$jdeShipping->setUser('1234');
$jdeShipping->setToken('1234');

$geo = new GeoSearchRequest();
$geo ->setMode(1);

$result = $jdeShipping->getGeoSearch($geo);
```

## Cost Calculation

### Delivery cost calculation by addresses
```php
$shipmentCalc = (new ShipmentCostCalcByAddressRequest())
	->setAddrFrom('владивосток')
	->setAddrTo('москва')
	->setType(1)
	->setWeight(2.167)
	->setWidth(0.121)
	->setHeight(0.121)
	->setLength(2.135)
	->setQuantity(1)
	->setPickup(1)
	->setDelivery(1)
	->setDeclared(3670)
	->setOversizeWeight(1)
	->setOversizeVolume(1)
	->setObrVolume(0.031);

$result = $this->jdeShipping->getShipmentCostCalcByAddress($shipmentCalc);

if($result->isOk()) {
	$cost = $result->getPrice();
}
```

### Delivery cost calculation
```php
$shipmentCalc = (new ShipmentCostCalcRequest())
	->setFrom('1010005858')
	->setTo('1125904247254472')
	->setType(1)
	->setWeight(216)
	->setVolume(0.41);

$result = $this->jdeShipping->getShipmentCostCalcByAddress($shipmentCalc);

if($result->isOk()) {
	$cost = $result->getPrice();
}
```

### SMART delivery cost calculation (by city names)
```php
$shipmentCalc = (new ShipmentCostCalcRequest())
	->setFrom('Москва')
	->setTo('Владивосток')
	->setType(1)
	->setWeight(216)
	->setVolume(0.41)
	->setSmart(true);
	

$result = $this->jdeShipping->getShipmentCostCalcByAddress($shipmentCalc);

if($result->isOk()) {
	$cost = $result->getPrice();
}

```

## Geography

### Searching for terminals by KLADR
```php
$geoKladr = (new GeoSearchByKladrRequest())
	->setKladrCode('5002700102400');

$result = $this->jdeShipping->getGeoSearchByKladr($geoKladr);

if(!empty($result)) {
	$city = $result[0]->getCity();
	$address = $result[0]->getAddr();
}
```