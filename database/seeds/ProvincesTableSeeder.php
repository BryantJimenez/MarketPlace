<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$provinces = [
            array('id' => '101','name' => 'Chachapoyas','department_id' => '1'),
            array('id' => '102','name' => 'Bagua','department_id' => '1'),
            array('id' => '103','name' => 'Bongará','department_id' => '1'),
            array('id' => '104','name' => 'Condorcanqui','department_id' => '1'),
            array('id' => '105','name' => 'Luya','department_id' => '1'),
            array('id' => '106','name' => 'Rodríguez de Mendoza','department_id' => '1'),
            array('id' => '107','name' => 'Utcubamba','department_id' => '1'),
            array('id' => '201','name' => 'Huaraz','department_id' => '2'),
            array('id' => '202','name' => 'Aija','department_id' => '2'),
            array('id' => '203','name' => 'Antonio Raymondi','department_id' => '2'),
            array('id' => '204','name' => 'Asunción','department_id' => '2'),
            array('id' => '205','name' => 'Bolognesi','department_id' => '2'),
            array('id' => '206','name' => 'Carhuaz','department_id' => '2'),
            array('id' => '207','name' => 'Carlos Fermín Fitzcarrald','department_id' => '2'),
            array('id' => '208','name' => 'Casma','department_id' => '2'),
            array('id' => '209','name' => 'Corongo','department_id' => '2'),
            array('id' => '210','name' => 'Huari','department_id' => '2'),
            array('id' => '211','name' => 'Huarmey','department_id' => '2'),
            array('id' => '212','name' => 'Huaylas','department_id' => '2'),
            array('id' => '213','name' => 'Mariscal Luzuriaga','department_id' => '2'),
            array('id' => '214','name' => 'Ocros','department_id' => '2'),
            array('id' => '215','name' => 'Pallasca','department_id' => '2'),
            array('id' => '216','name' => 'Pomabamba','department_id' => '2'),
            array('id' => '217','name' => 'Recuay','department_id' => '2'),
            array('id' => '218','name' => 'Santa','department_id' => '2'),
            array('id' => '219','name' => 'Sihuas','department_id' => '2'),
            array('id' => '220','name' => 'Yungay','department_id' => '2'),
            array('id' => '301','name' => 'Abancay','department_id' => '3'),
            array('id' => '302','name' => 'Andahuaylas','department_id' => '3'),
            array('id' => '303','name' => 'Antabamba','department_id' => '3'),
            array('id' => '304','name' => 'Aymaraes','department_id' => '3'),
            array('id' => '305','name' => 'Cotabambas','department_id' => '3'),
            array('id' => '306','name' => 'Chincheros','department_id' => '3'),
            array('id' => '307','name' => 'Grau','department_id' => '3'),
            array('id' => '401','name' => 'Arequipa','department_id' => '4'),
            array('id' => '402','name' => 'Camaná','department_id' => '4'),
            array('id' => '403','name' => 'Caravelí','department_id' => '4'),
            array('id' => '404','name' => 'Castilla','department_id' => '4'),
            array('id' => '405','name' => 'Caylloma','department_id' => '4'),
            array('id' => '406','name' => 'Condesuyos','department_id' => '4'),
            array('id' => '407','name' => 'Islay','department_id' => '4'),
            array('id' => '408','name' => 'La Uniòn','department_id' => '4'),
            array('id' => '501','name' => 'Huamanga','department_id' => '5'),
            array('id' => '502','name' => 'Cangallo','department_id' => '5'),
            array('id' => '503','name' => 'Huanca Sancos','department_id' => '5'),
            array('id' => '504','name' => 'Huanta','department_id' => '5'),
            array('id' => '505','name' => 'La Mar','department_id' => '5'),
            array('id' => '506','name' => 'Lucanas','department_id' => '5'),
            array('id' => '507','name' => 'Parinacochas','department_id' => '5'),
            array('id' => '508','name' => 'Pàucar del Sara Sara','department_id' => '5'),
            array('id' => '509','name' => 'Sucre','department_id' => '5'),
            array('id' => '510','name' => 'Víctor Fajardo','department_id' => '5'),
            array('id' => '511','name' => 'Vilcas Huamán','department_id' => '5'),
            array('id' => '601','name' => 'Cajamarca','department_id' => '6'),
            array('id' => '602','name' => 'Cajabamba','department_id' => '6'),
            array('id' => '603','name' => 'Celendín','department_id' => '6'),
            array('id' => '604','name' => 'Chota','department_id' => '6'),
            array('id' => '605','name' => 'Contumazá','department_id' => '6'),
            array('id' => '606','name' => 'Cutervo','department_id' => '6'),
            array('id' => '607','name' => 'Hualgayoc','department_id' => '6'),
            array('id' => '608','name' => 'Jaén','department_id' => '6'),
            array('id' => '609','name' => 'San Ignacio','department_id' => '6'),
            array('id' => '610','name' => 'San Marcos','department_id' => '6'),
            array('id' => '611','name' => 'San Miguel','department_id' => '6'),
            array('id' => '612','name' => 'San Pablo','department_id' => '6'),
            array('id' => '613','name' => 'Santa Cruz','department_id' => '6'),
            array('id' => '701','name' => 'Prov. Const. del Callao','department_id' => '7'),
            array('id' => '801','name' => 'Cusco','department_id' => '8'),
            array('id' => '802','name' => 'Acomayo','department_id' => '8'),
            array('id' => '803','name' => 'Anta','department_id' => '8'),
            array('id' => '804','name' => 'Calca','department_id' => '8'),
            array('id' => '805','name' => 'Canas','department_id' => '8'),
            array('id' => '806','name' => 'Canchis','department_id' => '8'),
            array('id' => '807','name' => 'Chumbivilcas','department_id' => '8'),
            array('id' => '808','name' => 'Espinar','department_id' => '8'),
            array('id' => '809','name' => 'La Convención','department_id' => '8'),
            array('id' => '810','name' => 'Paruro','department_id' => '8'),
            array('id' => '811','name' => 'Paucartambo','department_id' => '8'),
            array('id' => '812','name' => 'Quispicanchi','department_id' => '8'),
            array('id' => '813','name' => 'Urubamba','department_id' => '8'),
            array('id' => '901','name' => 'Huancavelica','department_id' => '9'),
            array('id' => '902','name' => 'Acobamba','department_id' => '9'),
            array('id' => '903','name' => 'Angaraes','department_id' => '9'),
            array('id' => '904','name' => 'Castrovirreyna','department_id' => '9'),
            array('id' => '905','name' => 'Churcampa','department_id' => '9'),
            array('id' => '906','name' => 'Huaytará','department_id' => '9'),
            array('id' => '907','name' => 'Tayacaja','department_id' => '9'),
            array('id' => '1001','name' => 'Huánuco','department_id' => '10'),
            array('id' => '1002','name' => 'Ambo','department_id' => '10'),
            array('id' => '1003','name' => 'Dos de Mayo','department_id' => '10'),
            array('id' => '1004','name' => 'Huacaybamba','department_id' => '10'),
            array('id' => '1005','name' => 'Huamalíes','department_id' => '10'),
            array('id' => '1006','name' => 'Leoncio Prado','department_id' => '10'),
            array('id' => '1007','name' => 'Marañón','department_id' => '10'),
            array('id' => '1008','name' => 'Pachitea','department_id' => '10'),
            array('id' => '1009','name' => 'Puerto Inca','department_id' => '10'),
            array('id' => '1010','name' => 'Lauricocha ','department_id' => '10'),
            array('id' => '1011','name' => 'Yarowilca ','department_id' => '10'),
            array('id' => '1101','name' => 'Ica ','department_id' => '11'),
            array('id' => '1102','name' => 'Chincha ','department_id' => '11'),
            array('id' => '1103','name' => 'Nasca ','department_id' => '11'),
            array('id' => '1104','name' => 'Palpa ','department_id' => '11'),
            array('id' => '1105','name' => 'Pisco ','department_id' => '11'),
            array('id' => '1201','name' => 'Huancayo ','department_id' => '12'),
            array('id' => '1202','name' => 'Concepción ','department_id' => '12'),
            array('id' => '1203','name' => 'Chanchamayo ','department_id' => '12'),
            array('id' => '1204','name' => 'Jauja ','department_id' => '12'),
            array('id' => '1205','name' => 'Junín ','department_id' => '12'),
            array('id' => '1206','name' => 'Satipo ','department_id' => '12'),
            array('id' => '1207','name' => 'Tarma ','department_id' => '12'),
            array('id' => '1208','name' => 'Yauli ','department_id' => '12'),
            array('id' => '1209','name' => 'Chupaca ','department_id' => '12'),
            array('id' => '1301','name' => 'Trujillo ','department_id' => '13'),
            array('id' => '1302','name' => 'Ascope ','department_id' => '13'),
            array('id' => '1303','name' => 'Bolívar ','department_id' => '13'),
            array('id' => '1304','name' => 'Chepén ','department_id' => '13'),
            array('id' => '1305','name' => 'Julcán ','department_id' => '13'),
            array('id' => '1306','name' => 'Otuzco ','department_id' => '13'),
            array('id' => '1307','name' => 'Pacasmayo ','department_id' => '13'),
            array('id' => '1308','name' => 'Pataz ','department_id' => '13'),
            array('id' => '1309','name' => 'Sánchez Carrión ','department_id' => '13'),
            array('id' => '1310','name' => 'Santiago de Chuco ','department_id' => '13'),
            array('id' => '1311','name' => 'Gran Chimú ','department_id' => '13'),
            array('id' => '1312','name' => 'Virú ','department_id' => '13'),
            array('id' => '1401','name' => 'Chiclayo ','department_id' => '14'),
            array('id' => '1402','name' => 'Ferreñafe ','department_id' => '14'),
            array('id' => '1403','name' => 'Lambayeque ','department_id' => '14'),
            array('id' => '1501','name' => 'Lima ','department_id' => '15'),
            array('id' => '1502','name' => 'Barranca ','department_id' => '15'),
            array('id' => '1503','name' => 'Cajatambo ','department_id' => '15'),
            array('id' => '1504','name' => 'Canta ','department_id' => '15'),
            array('id' => '1505','name' => 'Cañete ','department_id' => '15'),
            array('id' => '1506','name' => 'Huaral ','department_id' => '15'),
            array('id' => '1507','name' => 'Huarochirí ','department_id' => '15'),
            array('id' => '1508','name' => 'Huaura ','department_id' => '15'),
            array('id' => '1509','name' => 'Oyón ','department_id' => '15'),
            array('id' => '1510','name' => 'Yauyos ','department_id' => '15'),
            array('id' => '1601','name' => 'Maynas ','department_id' => '16'),
            array('id' => '1602','name' => 'Alto Amazonas ','department_id' => '16'),
            array('id' => '1603','name' => 'Loreto ','department_id' => '16'),
            array('id' => '1604','name' => 'Mariscal Ramón Castilla ','department_id' => '16'),
            array('id' => '1605','name' => 'Requena ','department_id' => '16'),
            array('id' => '1606','name' => 'Ucayali ','department_id' => '16'),
            array('id' => '1607','name' => 'Datem del Marañón ','department_id' => '16'),
            array('id' => '1608','name' => 'Putumayo','department_id' => '16'),
            array('id' => '1701','name' => 'Tambopata ','department_id' => '17'),
            array('id' => '1702','name' => 'Manu ','department_id' => '17'),
            array('id' => '1703','name' => 'Tahuamanu ','department_id' => '17'),
            array('id' => '1801','name' => 'Mariscal Nieto ','department_id' => '18'),
            array('id' => '1802','name' => 'General Sánchez Cerro ','department_id' => '18'),
            array('id' => '1803','name' => 'Ilo ','department_id' => '18'),
            array('id' => '1901','name' => 'Pasco ','department_id' => '19'),
            array('id' => '1902','name' => 'Daniel Alcides Carrión ','department_id' => '19'),
            array('id' => '1903','name' => 'Oxapampa ','department_id' => '19'),
            array('id' => '2001','name' => 'Piura ','department_id' => '20'),
            array('id' => '2002','name' => 'Ayabaca ','department_id' => '20'),
            array('id' => '2003','name' => 'Huancabamba ','department_id' => '20'),
            array('id' => '2004','name' => 'Morropón ','department_id' => '20'),
            array('id' => '2005','name' => 'Paita ','department_id' => '20'),
            array('id' => '2006','name' => 'Sullana ','department_id' => '20'),
            array('id' => '2007','name' => 'Talara ','department_id' => '20'),
            array('id' => '2008','name' => 'Sechura ','department_id' => '20'),
            array('id' => '2101','name' => 'Puno ','department_id' => '21'),
            array('id' => '2102','name' => 'Azángaro ','department_id' => '21'),
            array('id' => '2103','name' => 'Carabaya ','department_id' => '21'),
            array('id' => '2104','name' => 'Chucuito ','department_id' => '21'),
            array('id' => '2105','name' => 'El Collao ','department_id' => '21'),
            array('id' => '2106','name' => 'Huancané ','department_id' => '21'),
            array('id' => '2107','name' => 'Lampa ','department_id' => '21'),
            array('id' => '2108','name' => 'Melgar ','department_id' => '21'),
            array('id' => '2109','name' => 'Moho ','department_id' => '21'),
            array('id' => '2110','name' => 'San Antonio de Putina ','department_id' => '21'),
            array('id' => '2111','name' => 'San Román ','department_id' => '21'),
            array('id' => '2112','name' => 'Sandia ','department_id' => '21'),
            array('id' => '2113','name' => 'Yunguyo ','department_id' => '21'),
            array('id' => '2201','name' => 'Moyobamba ','department_id' => '22'),
            array('id' => '2202','name' => 'Bellavista ','department_id' => '22'),
            array('id' => '2203','name' => 'El Dorado ','department_id' => '22'),
            array('id' => '2204','name' => 'Huallaga ','department_id' => '22'),
            array('id' => '2205','name' => 'Lamas ','department_id' => '22'),
            array('id' => '2206','name' => 'Mariscal Cáceres ','department_id' => '22'),
            array('id' => '2207','name' => 'Picota ','department_id' => '22'),
            array('id' => '2208','name' => 'Rioja ','department_id' => '22'),
            array('id' => '2209','name' => 'San Martín ','department_id' => '22'),
            array('id' => '2210','name' => 'Tocache ','department_id' => '22'),
            array('id' => '2301','name' => 'Tacna ','department_id' => '23'),
            array('id' => '2302','name' => 'Candarave ','department_id' => '23'),
            array('id' => '2303','name' => 'Jorge Basadre ','department_id' => '23'),
            array('id' => '2304','name' => 'Tarata ','department_id' => '23'),
            array('id' => '2401','name' => 'Tumbes ','department_id' => '24'),
            array('id' => '2402','name' => 'Contralmirante Villar ','department_id' => '24'),
            array('id' => '2403','name' => 'Zarumilla ','department_id' => '24'),
            array('id' => '2501','name' => 'Coronel Portillo ','department_id' => '25'),
            array('id' => '2502','name' => 'Atalaya ','department_id' => '25'),
            array('id' => '2503','name' => 'Padre Abad ','department_id' => '25'),
            array('id' => '2504','name' => 'Purús','department_id' => '25')
        ];
        DB::table('provinces')->insert($provinces);
    }
}
