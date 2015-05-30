<?php

/**
 * @file Country
 */

namespace Geo\Models;

class Country extends \Eloquent {

    protected $fillable = array();
    protected $table = null;
    //Geographical ISO Locations
    //  Formatted for PHP, referenced from
    //  https://github.com/niall-oc/minimax/blob/master/country_state.js
    public $locations = array(
        'AFG' => array(
            'name' => 'Afghanistan',
            'country_code' => 93,
            'iso' => array(
                'alpha_2' => 'AF',
                'alpha_3' => 'AFG',
                'numeric' => 004,
                '3166_2' => 'ISO 3166_2:AF',
            ),
            'provinces' => array(
                'Badakhshan', 'Badghis', 'Baghlan', 'Balkh', 'Bamian', 'Farah', 'Faryab', 'Ghazni', 'Ghowr', 'Helmand', 'Herat', 'Jowzjan', 'Kabol', 'Kandahar', 'Kapisa', 'Konar', 'Kondoz', 'Laghman', 'Lowgar', 'Nangarhar', 'Nimruz', 'Oruzgan', 'Paktia', 'Paktika', 'Parvan', 'Samangan', 'Sar-e Pol', 'Takhar', 'Vardak', 'Zabol'
            ),
        ),
        'ALA' => array(
            'name' => 'Aland Islands',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'AX',
                'alpha_3' => 'ALA',
                'numeric' => 248,
                '3166_2' => 'ISO 3166_2:AX',
            ),
            'provinces' => array(
                'Aland Islands'
            ),
        ),
        'ALB' => array(
            'name' => 'Albania',
            'country_code' => 355,
            'iso' => array(
                'alpha_2' => 'AL',
                'alpha_3' => 'ALB',
                'numeric' => 008,
                '3166_2' => 'ISO 3166_2:AL',
            ),
            'provinces' => array(
                'Berat', 'Bulqize', 'Delvine', 'Devoll (Bilisht)', 'Diber (Peshkopi)', 'Durres', 'Elbasan', 'Fier', 'Gjirokaster', 'Gramsh', 'Has (Krume)', 'Kavaje', 'Kolonje (Erseke)', 'Korce', 'Kruje', 'Kucove', 'Kukes', 'Kurbin', 'Lezhe', 'Librazhd', 'Lushnje', 'Malesi e Madhe (Koplik)', 'Mallakaster (Ballsh)', 'Mat (Burrel)', 'Mirdite (Rreshen)', 'Peqin', 'Permet', 'Pogradec', 'Puke', 'Sarande', 'Shkoder', 'Skrapar (Corovode)', 'Tepelene', 'Tirane (Tirana)', 'Tirane (Tirana)', 'Tropoje (Bajram Curri)', 'Vlore'
            ),
        ),
        'DZA' => array(
            'name' => 'Algeria',
            'country_code' => 213,
            'iso' => array(
                'alpha_2' => 'DZ',
                'alpha_3' => 'DZA',
                'numeric' => 012,
                '3166_2' => 'ISO 3166_2:DZ',
            ),
            'provinces' => array(
                'Adrar', 'Ain Defla', 'Ain Temouchent', 'Alger', 'Annaba', 'Batna', 'Bechar', 'Bejaia', 'Biskra', 'Blida', 'Bordj Bou Arreridj', 'Bouira', 'Boumerdes', 'Chlef', 'Constantine', 'Djelfa', 'El Bayadh', 'El Oued', 'El Tarf', 'Ghardaia', 'Guelma', 'Illizi', 'Jijel', 'Khenchela', 'Laghouat', 'M&#8217;Sila', 'Mascara', 'Medea', 'Mila', 'Mostaganem', 'Naama', 'Oran', 'Ouargla', 'Oum el Bouaghi', 'Relizane', 'Saida', 'Setif', 'Sidi Bel Abbes', 'Skikda', 'Souk Ahras', 'Tamanghasset', 'Tebessa', 'Tiaret', 'Tindouf', 'Tipaza', 'Tissemsilt', 'Tizi Ouzou', 'Tlemcen',
            ),
        ),
        'ASM' => array(
            'name' => 'American Samoa',
            'country_code' => '1 684',
            'iso' => array(
                'alpha_2' => 'AS',
                'alpha_3' => 'ASM',
                'numeric' => 016,
                '3166_2' => 'ISO 3166_2:AS',
            ),
            'provinces' => array(
                'Eastern', 'Manu&#8217;a', 'Rose Island', 'Swains Island', 'Western',
            ),
        ),
        'AND' => array(
            'name' => 'Andorra',
            'country_code' => 376,
            'iso' => array(
                'alpha_2' => 'AD',
                'alpha_3' => 'AND',
                'numeric' => 020,
                '3166_2' => 'ISO 3166_2:AD',
            ),
            'provinces' => array(
                'Andorra'
            ),
        ),
        'AGO' => array(
            'name' => 'Angola',
            'country_code' => 244,
            'iso' => array(
                'alpha_2' => 'AO',
                'alpha_3' => 'AGO',
                'numeric' => 024,
                '3166_2' => 'ISO 3166_2:AO',
            ),
            'provinces' => array(
                'Andorra la Vella', 'Bengo', 'Benguela', 'Bie', 'Cabinda', 'Canillo', 'Cuando Cubango', 'Cuanza Norte', 'Cuanza Sul', 'Cunene', 'Encamp', 'Escaldes-Engordany', 'Huambo', 'Huila', 'La Massana', 'Luanda', 'Lunda Norte', 'Lunda Sul', 'Malanje', 'Moxico', 'Namibe', 'Ordino', 'Sant Julia de Loria', 'Uige', 'Zaire'
            ),
        ),
        'AIA' => array(
            'name' => 'Anguilla',
            'country_code' => '1 264',
            'iso' => array(
                'alpha_2' => 'AI',
                'alpha_3' => 'AIA',
                'numeric' => 660,
                '3166_2' => 'ISO 3166_2:AI',
            ),
            'provinces' => array(
                'Anguilla'
            ),
        ),
        'ATA' => array(
            'name' => 'Antarctica',
            'country_code' => 672,
            'iso' => array(
                'alpha_2' => 'AQ',
                'alpha_3' => 'ATA',
                'numeric' => 010,
                '3166_2' => 'ISO 3166_2:AQ',
            ),
            'provinces' => array(
                'Antarctica'
            ),
        ),
        'ATG' => array(
            'name' => 'Antigua and Barbuda',
            'country_code' => '1 268',
            'iso' => array(
                'alpha_2' => 'AG',
                'alpha_3' => 'ATG',
                'numeric' => 028,
                '3166_2' => 'ISO 3166_2:AG',
            ),
            'provinces' => array(
                'Barbuda', 'Redonda', 'Saint George', 'Saint John', 'Saint Mary', 'Saint Paul', 'Saint Peter', 'Saint Philip',
            ),
        ),
        'ARG' => array(
            'name' => 'Argentina',
            'country_code' => 54,
            'iso' => array(
                'alpha_2' => 'AR',
                'alpha_3' => 'ARG',
                'numeric' => 032,
                '3166_2' => 'ISO 3166_2:AR',
            ),
            'provinces' => array(
                'Antartica e Islas del Atlantico Sur', 'Buenos Aires', 'Buenos Aires Capital Federal', 'Catamarca', 'Chaco', 'Chubut', 'Cordoba', 'Corrientes', 'Entre Rios', 'Formosa', 'Jujuy', 'La Pampa', 'La Rioja', 'Mendoza', 'Misiones', 'Neuquen', 'Rio Negro', 'Salta', 'San Juan', 'San Luis', 'Santa Cruz', 'Santa Fe', 'Santiago del Estero', 'Tierra del Fuego', 'Tucuman',
            ),
        ),
        'ARM' => array(
            'name' => 'Armenia',
            'country_code' => 374,
            'iso' => array(
                'alpha_2' => 'AM',
                'alpha_3' => 'ARM',
                'numeric' => 051,
                '3166_2' => 'ISO 3166_2:AM',
            ),
            'provinces' => array(
                'Aragatsotn', 'Ararat', 'Armavir', 'Geghark&#8217;unik&#8217;', 'Kotayk&#8217;', 'Lorri', 'Shirak', 'Syunik&#8217;', 'Tavush', 'Vayots&#8217; Dzor', 'Yerevan'
            ),
        ),
        'ABW' => array(
            'name' => 'Aruba',
            'country_code' => 297,
            'iso' => array(
                'alpha_2' => 'AW',
                'alpha_3' => 'ABW',
                'numeric' => 533,
                '3166_2' => 'ISO 3166_2:AW',
            ),
            'provinces' => array(
                'Aruba'
            ),
        ),
        'AUS' => array(
            'name' => 'Australia',
            'country_code' => 61,
            'iso' => array(
                'alpha_2' => 'AU',
                'alpha_3' => 'AUS',
                'numeric' => 036,
                '3166_2' => 'ISO 3166_2:AU',
            ),
            'provinces' => array(
                'Australian Capital Territory', 'New South Wales', 'Northern Territory', 'Queensland', 'South Australia', 'Tasmania', 'Victoria', 'Western Australia',
            ),
        ),
        'AUT' => array(
            'name' => 'Austria',
            'country_code' => 43,
            'iso' => array(
                'alpha_2' => 'AT',
                'alpha_3' => 'AUT',
                'numeric' => 040,
                '3166_2' => 'ISO 3166_2:AT',
            ),
            'provinces' => array(
                'Burgenland', 'Kaernten', 'Niederoesterreich', 'Oberoesterreich', 'Salzburg', 'Steiermark', 'Tirol', 'Vorarlberg', 'Wien',
            ),
        ),
        'AZE' => array(
            'name' => 'Azerbaijan',
            'country_code' => 994,
            'iso' => array(
                'alpha_2' => 'AZ',
                'alpha_3' => 'AZE',
                'numeric' => 031,
                '3166_2' => 'ISO 3166_2:AZ',
            ),
            'provinces' => array(
                'Abseron Rayonu', 'Agcabadi Rayonu', 'Agdam Rayonu', 'Agdas Rayonu', 'Agstafa Rayonu', 'Agsu Rayonu', 'Ali Bayramli Sahari', 'Astara Rayonu', 'Baki Sahari', 'Balakan Rayonu', 'Barda Rayonu', 'Beylaqan Rayonu', 'Bilasuvar Rayonu', 'Cabrayil Rayonu', 'Calilabad Rayonu', 'Daskasan Rayonu', 'Davaci Rayonu', 'Fuzuli Rayonu', 'Gadabay Rayonu', 'Ganca Sahari', 'Goranboy Rayonu', 'Goycay Rayonu', 'Haciqabul Rayonu', 'Imisli Rayonu', 'Ismayilli Rayonu', 'Kalbacar Rayonu', 'Kurdamir Rayonu', 'Lacin Rayonu', 'Lankaran Rayonu', 'Lankaran Sahari', 'Lerik Rayonu', 'Masalli Rayonu', 'Mingacevir Sahari', 'Naftalan Sahari', 'Naxcivan Muxtar Respublikasi', 'Neftcala Rayonu', 'Oguz Rayonu', 'Qabala Rayonu', 'Qax Rayonu', 'Qazax Rayonu', 'Qobustan Rayonu', 'Quba Rayonu', 'Qubadli Rayonu', 'Qusar Rayonu', 'Saatli Rayonu', 'Sabirabad Rayonu', 'Saki Rayonu', 'Saki Sahari', 'Salyan Rayonu', 'Samaxi Rayonu', 'Samkir Rayonu', 'Samux Rayonu', 'Siyazan Rayonu', 'Sumqayit Sahari', 'Susa Rayonu', 'Susa Sahari', 'Tartar Rayonu', 'Tovuz Rayonu', 'Ucar Rayonu', 'Xacmaz Rayonu', 'Xankandi Sahari', 'Xanlar Rayonu', 'Xizi Rayonu', 'Xocali Rayonu', 'Xocavand Rayonu', 'Yardimli Rayonu', 'Yevlax Rayonu', 'Yevlax Sahari', 'Zangilan Rayonu', 'Zaqatala Rayonu', 'Zardab Rayonu',
            ),
        ),
        'BHS' => array(
            'name' => 'Bahamas',
            'country_code' => '1 242',
            'iso' => array(
                'alpha_2' => 'BS',
                'alpha_3' => 'BHS',
                'numeric' => 044,
                '3166_2' => 'ISO 3166_2:BS',
            ),
            'provinces' => array(
                'Acklins and Crooked Islands', 'Bimini', 'Cat Island', 'Exuma', 'Freeport', 'Fresh Creek', 'Governor&#8217;s Harbour', 'Green Turtle Cay', 'Harbour Island', 'High Rock', 'Inagua', 'Kemps Bay', 'Long Island', 'Marsh Harbour', 'Mayaguana', 'New Providence', 'Nicholls Town and Berry Islands', 'Ragged Island', 'Rock Sound', 'San Salvador and Rum Cay', 'Sandy Point',
            ),
        ),
        'BHR' => array(
            'name' => 'Bahrain',
            'country_code' => 973,
            'iso' => array(
                'alpha_2' => 'BH',
                'alpha_3' => 'BHR',
                'numeric' => 048,
                '3166_2' => 'ISO 3166_2:BH',
            ),
            'provinces' => array(
                'Al Hadd', 'Al Manamah', 'Al Mintaqah al Gharbiyah', 'Al Mintaqah al Wusta', 'Al Mintaqah ash Shamaliyah', 'Al Muharraq', 'Ar Rifa&#8217; wa al Mintaqah al Janubiyah', 'Jidd Hafs', 'Juzur Hawar', 'Madinat &#8217;Isa', 'Madinat Hamad', 'Sitrah'
            ),
        ),
        'BGD' => array(
            'name' => 'Bangladesh',
            'country_code' => 880,
            'iso' => array(
                'alpha_2' => 'BD',
                'alpha_3' => 'BGD',
                'numeric' => 050,
                '3166_2' => 'ISO 3166_2:BD',
            ),
            'provinces' => array(
                'Barguna', 'Barisal', 'Bhola', 'Jhalokati', 'Patuakhali', 'Pirojpur', 'Bandarban', 'Brahmanbaria', 'Chandpur', 'Chittagong', 'Comilla', 'Cox&#8217;s Bazar', 'Feni', 'Khagrachari', 'Lakshmipur', 'Noakhali', 'Rangamati', 'Dhaka', 'Faridpur', 'Gazipur', 'Gopalganj', 'Jamalpur', 'Kishoreganj', 'Madaripur', 'Manikganj', 'Munshiganj', 'Mymensingh', 'Narayanganj', 'Narsingdi', 'Netrokona', 'Rajbari', 'Shariatpur', 'Sherpur', 'Tangail', 'Bagerhat', 'Chuadanga', 'Jessore', 'Jhenaidah', 'Khulna', 'Kushtia', 'Magura', 'Meherpur', 'Narail', 'Satkhira', 'Bogra', 'Dinajpur', 'Gaibandha', 'Jaipurhat', 'Kurigram', 'Lalmonirhat', 'Naogaon', 'Natore', 'Nawabganj', 'Nilphamari', 'Pabna', 'Panchagarh', 'Rajshahi', 'Rangpur', 'Sirajganj', 'Thakurgaon', 'Habiganj', 'Maulvi bazar', 'Sunamganj', 'Sylhet'
            ),
        ),
        'BRB' => array(
            'name' => 'Barbados',
            'country_code' => '1 246',
            'iso' => array(
                'alpha_2' => 'BB',
                'alpha_3' => 'BRB',
                'numeric' => 052,
                '3166_2' => 'ISO 3166_2:BB',
            ),
            'provinces' => array(
                'Bridgetown', 'Christ Church', 'Saint Andrew', 'Saint George', 'Saint James', 'Saint John', 'Saint Joseph', 'Saint Lucy', 'Saint Michael', 'Saint Peter', 'Saint Philip', 'Saint Thomas',
            ),
        ),
        'BLR' => array(
            'name' => 'Belarus',
            'country_code' => 375,
            'iso' => array(
                'alpha_2' => 'BY',
                'alpha_3' => 'BLR',
                'numeric' => 112,
                '3166_2' => 'ISO 3166_2:BY',
            ),
            'provinces' => array(
                'Brestskaya (Brest)', 'Homyel&#8217;skaya (Homyel&#8217;)', 'Horad Minsk', 'Hrodzyenskaya (Hrodna)', 'Mahilyowskaya (Mahilyow)', 'Minskaya', 'Vitsyebskaya (Vitsyebsk)'
            ),
        ),
        'BEL' => array(
            'name' => 'Belgium',
            'country_code' => 32,
            'iso' => array(
                'alpha_2' => 'BE',
                'alpha_3' => 'BEL',
                'numeric' => 056,
                '3166_2' => 'ISO 3166_2:BE',
            ),
            'provinces' => array(
                'Antwerpen', 'Brabant Wallon', 'Brussels Capitol Region', 'Hainaut', 'Liege', 'Limburg', 'Luxembourg', 'Namur', 'Oost-Vlaanderen', 'Vlaams Brabant', 'West-Vlaanderen',
            ),
        ),
        'BLZ' => array(
            'name' => 'Belize',
            'country_code' => 501,
            'iso' => array(
                'alpha_2' => 'BZ',
                'alpha_3' => 'BLZ',
                'numeric' => 084,
                '3166_2' => 'ISO 3166_2:BZ',
            ),
            'provinces' => array(
                'Belize', 'Cayo', 'Corozal', 'Orange Walk', 'Stann Creek', 'Toledo',
            ),
        ),
        'BEN' => array(
            'name' => 'Benin',
            'country_code' => 229,
            'iso' => array(
                'alpha_2' => 'BJ',
                'alpha_3' => 'BEN',
                'numeric' => 204,
                '3166_2' => 'ISO 3166_2:BJ',
            ),
            'provinces' => array(
                'Alibori', 'Atakora', 'Atlantique', 'Borgou', 'Collines', 'Couffo', 'Donga', 'Littoral', 'Mono', 'Oueme', 'Plateau', 'Zou',
            ),
        ),
        'BMU' => array(
            'name' => 'Bermuda',
            'country_code' => '1 441',
            'iso' => array(
                'alpha_2' => 'BM',
                'alpha_3' => 'BMU',
                'numeric' => 060,
                '3166_2' => 'ISO 3166_2:BM',
            ),
            'provinces' => array(
                'Devonshire', 'Hamilton', 'Hamilton', 'Paget', 'Pembroke', 'Saint George', 'Saint Georges', 'Sandys', 'Smiths', 'Southampton', 'Warwick',
            ),
        ),
        'BTN' => array(
            'name' => 'Bhutan',
            'country_code' => 975,
            'iso' => array(
                'alpha_2' => 'BT',
                'alpha_3' => 'BTN',
                'numeric' => 064,
                '3166_2' => 'ISO 3166_2:BT',
            ),
            'provinces' => array(
                'Bumthang', 'Chhukha', 'Chirang', 'Daga', 'Geylegphug', 'Ha', 'Lhuntshi', 'Mongar', 'Paro', 'Pemagatsel', 'Punakha', 'Samchi', 'Samdrup Jongkhar', 'Shemgang', 'Tashigang', 'Thimphu', 'Tongsa', 'Wangdi Phodrang',
            ),
        ),
        'BOL' => array(
            'name' => 'Bolivia Plurinational State of',
            'country_code' => 591,
            'iso' => array(
                'alpha_2' => 'BO',
                'alpha_3' => 'BOL',
                'numeric' => 068,
                '3166_2' => 'ISO 3166_2:BO',
            ),
            'provinces' => array(
                'Beni', 'Chuquisaca', 'Cochabamba', 'La Paz', 'Oruro', 'Pando', 'Potosi', 'Santa Cruz', 'Tarija',
            ),
        ),
        'BES' => array(
            'name' => 'Bonaire Sint Eustatius and Saba',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'BQ',
                'alpha_3' => 'BES',
                'numeric' => 535,
                '3166_2' => 'ISO 3166_2:BQ',
            ),
            'provinces' => array(
                'Bonaire'
            )
        ),
        'BIH' => array(
            'name' => 'Bosnia and Herzegovina',
            'country_code' => 387,
            'iso' => array(
                'alpha_2' => 'BA',
                'alpha_3' => 'BIH',
                'numeric' => 070,
                '3166_2' => 'ISO 3166_2:BA',
            ),
            'provinces' => array(
                'Federation of Bosnia and Herzegovina', 'Republika Srpska',
            ),
        ),
        'BWA' => array(
            'name' => 'Botswana',
            'country_code' => 267,
            'iso' => array(
                'alpha_2' => 'BW',
                'alpha_3' => 'BWA',
                'numeric' => 072,
                '3166_2' => 'ISO 3166_2:BW',
            ),
            'provinces' => array(
                'Central', 'Chobe', 'Francistown', 'Gaborone', 'Ghanzi', 'Kgalagadi', 'Kgatleng', 'Kweneng', 'Lobatse', 'Ngamiland', 'North-East', 'Selebi-Pikwe', 'South-East', 'Southern',
            ),
        ),
        'BVT' => array(
            'name' => 'Bouvet Island',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'BV',
                'alpha_3' => 'BVT',
                'numeric' => 074,
                '3166_2' => 'ISO 3166_2:BV',
            ),
            'provinces' => array(
                'Bouvet Island'
            ),
        ),
        'BRA' => array(
            'name' => 'Brazil',
            'country_code' => 55,
            'iso' => array(
                'alpha_2' => 'BR',
                'alpha_3' => 'BRA',
                'numeric' => 076,
                '3166_2' => 'ISO 3166_2:BR',
            ),
            'provinces' => array(
                'Acre', 'Alagoas', 'Amapa', 'Amazonas', 'Bahia', 'Ceara', 'Distrito Federal', 'Espirito Santo', 'Goias', 'Maranhao', 'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Para', 'Paraiba', 'Parana', 'Pernambuco', 'Piaui', 'Rio de Janeiro', 'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondonia', 'Roraima', 'Santa Catarina', 'Sao Paulo', 'Sergipe', 'Tocantins',
            ),
        ),
        'IOT' => array(
            'name' => 'British Indian Ocean Territory',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'IO',
                'alpha_3' => 'IOT',
                'numeric' => 086,
                '3166_2' => 'ISO 3166_2:IO',
            ),
            'provinces' => array(
                'British Indian Ocean Territory'
            ),
        ),
        'BRN' => array(
            'name' => 'Brunei Darussalam',
            'country_code' => 673,
            'iso' => array(
                'alpha_2' => 'BN',
                'alpha_3' => 'BRN',
                'numeric' => 096,
                '3166_2' => 'ISO 3166_2:BN',
            ),
            'provinces' => array(
                'Belait', 'Brunei and Muara', 'Temburong', 'Tutong',
            ),
        ),
        'BGR' => array(
            'name' => 'Bulgaria',
            'country_code' => 359,
            'iso' => array(
                'alpha_2' => 'BG',
                'alpha_3' => 'BGR',
                'numeric' => 100,
                '3166_2' => 'ISO 3166_2:BG',
            ),
            'provinces' => array(
                'Blagoevgrad', 'Burgas', 'Dobrich', 'Gabrovo', 'Khaskovo', 'Kurdzhali', 'Kyustendil', 'Lovech', 'Montana', 'Pazardzhik', 'Pernik', 'Pleven', 'Plovdiv', 'Razgrad', 'Ruse', 'Shumen', 'Silistra', 'Sliven', 'Smolyan', 'Sofiya', 'Sofiya-Grad', 'Stara Zagora', 'Turgovishte', 'Varna', 'Veliko Turnovo', 'Vidin', 'Vratsa', 'Yambol',
            ),
        ),
        'BFA' => array(
            'name' => 'Burkina Faso',
            'country_code' => 226,
            'iso' => array(
                'alpha_2' => 'BF',
                'alpha_3' => 'BFA',
                'numeric' => 854,
                '3166_2' => 'ISO 3166_2:BF',
            ),
            'provinces' => array(
                'Bale', 'Bam', 'Banwa', 'Bazega', 'Bougouriba', 'Boulgou', 'Boulkiemde', 'Comoe', 'Ganzourgou', 'Gnagna', 'Gourma', 'Houet', 'Ioba', 'Kadiogo', 'Kenedougou', 'Komandjari', 'Kompienga', 'Kossi', 'Koupelogo', 'Kouritenga', 'Kourweogo', 'Leraba', 'Loroum', 'Mouhoun', 'Nahouri', 'Namentenga', 'Naumbiel', 'Nayala', 'Oubritenga', 'Oudalan', 'Passore', 'Poni', 'Samentenga', 'Sanguie', 'Seno', 'Sissili', 'Soum', 'Sourou', 'Tapoa', 'Tuy', 'Yagha', 'Yatenga', 'Ziro', 'Zondomo', 'Zoundweogo',
            ),
        ),
        'BDI' => array(
            'name' => 'Burundi',
            'country_code' => 257,
            'iso' => array(
                'alpha_2' => 'BI',
                'alpha_3' => 'BDI',
                'numeric' => 108,
                '3166_2' => 'ISO 3166_2:BI',
            ),
            'provinces' => array(
                'Bubanza', 'Bujumbura', 'Bururi', 'Cankuzo', 'Cibitoke', 'Gitega', 'Karuzi', 'Kayanza', 'Kirundo', 'Makamba', 'Muramvya', 'Muyinga', 'Mwaro', 'Ngozi', 'Rutana', 'Ruyigi',
            ),
        ),
        'KHM' => array(
            'name' => 'Cambodia',
            'country_code' => 855,
            'iso' => array(
                'alpha_2' => 'KH',
                'alpha_3' => 'KHM',
                'numeric' => 116,
                '3166_2' => 'ISO 3166_2:KH',
            ),
            'provinces' => array(
                'Banteay Mean Cheay', 'Batdambang', 'Kampong Cham', 'Kampong Chhnang', 'Kampong Spoe', 'Kampong Thum', 'Kampot', 'Kandal', 'Kaoh Kong', 'Keb', 'Kracheh', 'Mondol Kiri', 'Otdar Mean Cheay', 'Pailin', 'Phnum Penh', 'Pouthisat', 'Preah Seihanu (Sihanoukville)', 'Preah Vihear', 'Prey Veng', 'Rotanah Kiri', 'Siem Reab', 'Stoeng Treng', 'Svay Rieng', 'Takev',
            ),
        ),
        'CMR' => array(
            'name' => 'Cameroon',
            'country_code' => 237,
            'iso' => array(
                'alpha_2' => 'CM',
                'alpha_3' => 'CMR',
                'numeric' => 120,
                '3166_2' => 'ISO 3166_2:CM',
            ),
            'provinces' => array(
                'Adamaoua', 'Centre', 'Est', 'Extreme-Nord', 'Littoral', 'Nord', 'Nord-Ouest', 'Ouest', 'Sud', 'Sud-Ouest',
            ),
        ),
        'CAN' => array(
            'name' => 'Canada',
            'country_code' => 1,
            'iso' => array(
                'alpha_2' => 'CA',
                'alpha_3' => 'CAN',
                'numeric' => 124,
                '3166_2' => 'ISO 3166_2:CA',
            ),
            'provinces' => array(
                'Alberta', 'British Columbia', 'Manitoba', 'New Brunswick', 'Newfoundland', 'Northwest Territories', 'Nova Scotia', 'Nunavut', 'Ontario', 'Prince Edward Island', 'Quebec', 'Saskatchewan', 'Yukon',
            ),
        ),
        'CPV' => array(
            'name' => 'Cape Verde',
            'country_code' => 238,
            'iso' => array(
                'alpha_2' => 'CV',
                'alpha_3' => 'CPV',
                'numeric' => 132,
                '3166_2' => 'ISO 3166_2:CV',
            ),
            'provinces' => array(
                'Boa Vista', 'Brava', 'Maio', 'Mosteiros', 'Paul', 'Porto Novo', 'Praia', 'Ribeira Grande', 'Sal', 'Santa Catarina', 'Santa Cruz', 'Sao Domingos', 'Sao Filipe', 'Sao Nicolau', 'Sao Vicente', 'Tarrafal',
            ),
        ),
        'CYM' => array(
            'name' => 'Cayman Islands',
            'country_code' => '1 345',
            'iso' => array(
                'alpha_2' => 'KY',
                'alpha_3' => 'CYM',
                'numeric' => 136,
                '3166_2' => 'ISO 3166_2:KY',
            ),
            'provinces' => array(
                'Creek', 'Eastern', 'Midland', 'South Town', 'Spot Bay', 'Stake Bay', 'West End', 'Western',
            ),
        ),
        'CAF' => array(
            'name' => 'Central African Republic',
            'country_code' => 236,
            'iso' => array(
                'alpha_2' => 'CF',
                'alpha_3' => 'CAF',
                'numeric' => 140,
                '3166_2' => 'ISO 3166_2:CF',
            ),
            'provinces' => array(
                'Bamingui-Bangoran', 'Bangui', 'Basse-Kotto', 'Gribingui', 'Haut-Mbomou', 'Haute-Kotto', 'Haute-Sangha', 'Kemo-Gribingui', 'Lobaye', 'Mbomou', 'Nana-Mambere', 'Ombella-Mpoko', 'Ouaka', 'Ouham', 'Ouham-Pende', 'Sangha', 'Vakaga',
            ),
        ),
        'TCD' => array(
            'name' => 'Chad',
            'country_code' => 235,
            'iso' => array(
                'alpha_2' => 'TD',
                'alpha_3' => 'TCD',
                'numeric' => 148,
                '3166_2' => 'ISO 3166_2:TD',
            ),
            'provinces' => array(
                'Batha', 'Biltine', 'Borkou-Ennedi-Tibesti', 'Chari-Baguirmi', 'Guera', 'Kanem', 'Lac', 'Logone Occidental', 'Logone Oriental', 'Mayo-Kebbi', 'Moyen-Chari', 'Ouaddai', 'Salamat', 'Tandjile',
            ),
        ),
        'CHL' => array(
            'name' => 'Chile',
            'country_code' => 56,
            'iso' => array(
                'alpha_2' => 'CL',
                'alpha_3' => 'CHL',
                'numeric' => 152,
                '3166_2' => 'ISO 3166_2:CL',
            ),
            'provinces' => array(
                'Aisen del General Carlos Ibanez del Campo', 'Antofagasta', 'Araucania', 'Atacama', 'Bio-Bio', 'Coquimbo', 'Libertador General Bernardo O&#8217;Higgins', 'Los Lagos', 'Magallanes y de la Antartica Chilena', 'Maule', 'Region Metropolitana (Santiago)', 'Tarapaca', 'Valparaiso',
            ),
        ),
        'CHN' => array(
            'name' => 'China',
            'country_code' => 86,
            'iso' => array(
                'alpha_2' => 'CN',
                'alpha_3' => 'CHN',
                'numeric' => 156,
                '3166_2' => 'ISO 3166_2:CN',
            ),
            'provinces' => array(
                'Anhui', 'Beijing', 'Chongqing', 'Fujian', 'Gansu', 'Guangdong', 'Guangxi', 'Guizhou', 'Hainan', 'Hebei', 'Heilongjiang', 'Henan', 'Hubei', 'Hunan', 'Jiangsu', 'Jiangxi', 'Jilin', 'Liaoning', 'Nei Mongol', 'Ningxia', 'Qinghai', 'Shaanxi', 'Shandong', 'Shanghai', 'Shanxi', 'Sichuan', 'Tianjin', 'Xinjiang', 'Xizang (Tibet)', 'Yunnan', 'Zhejiang',
            ),
        ),
        'CXR' => array(
            'name' => 'Christmas Island',
            'country_code' => 61,
            'iso' => array(
                'alpha_2' => 'CX',
                'alpha_3' => 'CXR',
                'numeric' => 162,
                '3166_2' => 'ISO 3166_2:CX',
            ),
            'provinces' => array(
                'Christmas Island'
            ),
        ),
        'CCK' => array(
            'name' => 'Cocos (Keeling) Islands',
            'country_code' => 61,
            'iso' => array(
                'alpha_2' => 'CC',
                'alpha_3' => 'CCK',
                'numeric' => 166,
                '3166_2' => 'ISO 3166_2:CC',
            ),
            'provinces' => array(
                'Direction Island', 'Home Island', 'Horsburgh Island', 'North Keeling Island', 'South Island', 'West Island',
            ),
        ),
        'COL' => array(
            'name' => 'Colombia',
            'country_code' => 57,
            'iso' => array(
                'alpha_2' => 'CO',
                'alpha_3' => 'COL',
                'numeric' => 170,
                '3166_2' => 'ISO 3166_2:CO',
            ),
            'provinces' => array(
                'Amazonas', 'Antioquia', 'Arauca', 'Atlantico', 'Bolivar', 'Boyaca', 'Caldas', 'Caqueta', 'Casanare', 'Cauca', 'Cesar', 'Choco', 'Cordoba', 'Cundinamarca', 'Distrito Capital de Santa Fe de Bogota', 'Guainia', 'Guaviare', 'Huila', 'La Guajira', 'Magdalena', 'Meta', 'Narino', 'Norte de Santander', 'Putumayo', 'Quindio', 'Risaralda', 'San Andres y Providencia', 'Santander', 'Sucre', 'Tolima', 'Valle del Cauca', 'Vaupes', 'Vichada',
            ),
        ),
        'COM' => array(
            'name' => 'Comoros',
            'country_code' => 269,
            'iso' => array(
                'alpha_2' => 'KM',
                'alpha_3' => 'COM',
                'numeric' => 174,
                '3166_2' => 'ISO 3166_2:KM',
            ),
            'provinces' => array(
                'Anjouan (Nzwani)', 'Domoni', 'Fomboni', 'Grande Comore (Njazidja)', 'Moheli (Mwali)', 'Moroni', 'Moutsamoudou',
            ),
        ),
        'COG' => array(
            'name' => 'Congo',
            'country_code' => 242,
            'iso' => array(
                'alpha_2' => 'CG',
                'alpha_3' => 'COG',
                'numeric' => 178,
                '3166_2' => 'ISO 3166_2:CG',
            ),
            'provinces' => array(
                'Bouenza', 'Brazzaville', 'Cuvette', 'Kouilou', 'Lekoumou', 'Likouala', 'Niari', 'Plateaux', 'Pool', 'Sangha',
            ),
        ),
        'COD' => array(
            'name' => 'Congo the Democratic Republic of the',
            'country_code' => 243,
            'iso' => array(
                'alpha_2' => 'CD',
                'alpha_3' => 'COD',
                'numeric' => 180,
                '3166_2' => 'ISO 3166_2:CD',
            ),
            'provinces' => array(
                'Bandundu', 'Bas-Congo', 'Equateur', 'Kasai-Occidental', 'Kasai-Oriental', 'Katanga', 'Kinshasa', 'Maniema', 'Nord-Kivu', 'Orientale', 'Sud-Kivu',
            ),
        ),
        'COK' => array(
            'name' => 'Cook Islands',
            'country_code' => 682,
            'iso' => array(
                'alpha_2' => 'CK',
                'alpha_3' => 'COK',
                'numeric' => 184,
                '3166_2' => 'ISO 3166_2:CK',
            ),
            'provinces' => array(
                'Aitutaki', 'Atiu', 'Avarua', 'Mangaia', 'Manihiki', 'Manuae', 'Mauke', 'Mitiaro', 'Nassau Island', 'Palmerston', 'Penrhyn', 'Pukapuka', 'Rakahanga', 'Rarotonga', 'Suwarrow', 'Takutea',
            ),
        ),
        'CRI' => array(
            'name' => 'Costa Rica',
            'country_code' => 506,
            'iso' => array(
                'alpha_2' => 'CR',
                'alpha_3' => 'CRI',
                'numeric' => 188,
                '3166_2' => 'ISO 3166_2:CR',
            ),
            'provinces' => array(
                'Alajuela', 'Cartago', 'Guanacaste', 'Heredia', 'Limon', 'Puntarenas', 'San Jose',
            ),
        ),
        'CIV' => array(
            'name' => 'Cote d&#8217;Ivoire',
            'country_code' => 225,
            'iso' => array(
                'alpha_2' => 'CI',
                'alpha_3' => 'CIV',
                'numeric' => 384,
                '3166_2' => 'ISO 3166_2:CI',
            ),
            'provinces' => array(
                'Abengourou', 'Abidjan', 'Aboisso', 'Adiake&#8217;', 'Adzope', 'Agboville', 'Agnibilekrou', 'Ale&#8217;pe&#8217;', 'Bangolo', 'Beoumi', 'Biankouma', 'Bocanda', 'Bondoukou', 'Bongouanou', 'Bouafle', 'Bouake', 'Bouna', 'Boundiali', 'Dabakala', 'Dabon', 'Daloa', 'Danane', 'Daoukro', 'Dimbokro', 'Divo', 'Duekoue', 'Ferkessedougou', 'Gagnoa', 'Grand Bassam', 'Grand-Lahou', 'Guiglo', 'Issia', 'Jacqueville', 'Katiola', 'Korhogo', 'Lakota', 'Man', 'Mankono', 'Mbahiakro', 'Odienne', 'Oume', 'Sakassou', 'San-Pedro', 'Sassandra', 'Seguela', 'Sinfra', 'Soubre', 'Tabou', 'Tanda', 'Tiassale', 'Tiebissou', 'Tingrela', 'Touba', 'Toulepleu', 'Toumodi', 'Vavoua', 'Yamoussoukro', 'Zuenoula',
            ),
        ),
        'HRV' => array(
            'name' => 'Croatia',
            'country_code' => 385,
            'iso' => array(
                'alpha_2' => 'HR',
                'alpha_3' => 'HRV',
                'numeric' => 191,
                '3166_2' => 'ISO 3166_2:HR',
            ),
            'provinces' => array(
                'Bjelovarsko-Bilogorska Zupanija', 'Brodsko-Posavska Zupanija', 'Dubrovacko-Neretvanska Zupanija', 'Istarska Zupanija', 'Karlovacka Zupanija', 'Koprivnicko-Krizevacka Zupanija', 'Krapinsko-Zagorska Zupanija', 'Licko-Senjska Zupanija', 'Medimurska Zupanija', 'Osjecko-Baranjska Zupanija', 'Pozesko-Slavonska Zupanija', 'Primorsko-Goranska Zupanija', 'Sibensko-Kninska Zupanija', 'Sisacko-Moslavacka Zupanija', 'Splitsko-Dalmatinska Zupanija', 'Varazdinska Zupanija', 'Viroviticko-Podravska Zupanija', 'Vukovarsko-Srijemska Zupanija', 'Zadarska Zupanija', 'Zagreb', 'Zagrebacka Zupanija',
            ),
        ),
        'CUB' => array(
            'name' => 'Cuba',
            'country_code' => 53,
            'iso' => array(
                'alpha_2' => 'CU',
                'alpha_3' => 'CUB',
                'numeric' => 192,
                '3166_2' => 'ISO 3166_2:CU',
            ),
            'provinces' => array(
                'Camaguey', 'Ciego de Avila', 'Cienfuegos', 'Ciudad de La Habana', 'Granma', 'Guantanamo', 'Holguin', 'Isla de la Juventud', 'La Habana', 'Las Tunas', 'Matanzas', 'Pinar del Rio', 'Sancti Spiritus', 'Santiago de Cuba', 'Villa Clara',
            ),
        ),
        'CUW' => array(
            'name' => 'Curacao',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'CW',
                'alpha_3' => 'CUW',
                'numeric' => 531,
                '3166_2' => 'ISO 3166_2:CW',
            ),
            'provinces' => array(
                'Curacao'
            ),
        ),
        'CYP' => array(
            'name' => 'Cyprus',
            'country_code' => 357,
            'iso' => array(
                'alpha_2' => 'CY',
                'alpha_3' => 'CYP',
                'numeric' => 196,
                '3166_2' => 'ISO 3166_2:CY',
            ),
            'provinces' => array(
                'Famagusta', 'Kyrenia', 'Larnaca', 'Limassol', 'Nicosia', 'Paphos',
            ),
        ),
        'CZE' => array(
            'name' => 'Czech Republic',
            'country_code' => 420,
            'iso' => array(
                'alpha_2' => 'CZ',
                'alpha_3' => 'CZE',
                'numeric' => 203,
                '3166_2' => 'ISO 3166_2:CZ',
            ),
            'provinces' => array(
                'Brnensky', 'Budejovicky', 'Jihlavsky', 'Karlovarsky', 'Kralovehradecky', 'Liberecky', 'Olomoucky', 'Ostravsky', 'Pardubicky', 'Plzensky', 'Praha', 'Stredocesky', 'Ustecky', 'Zlinsky',
            ),
        ),
        'DNK' => array(
            'name' => 'Denmark',
            'country_code' => 45,
            'iso' => array(
                'alpha_2' => 'DK',
                'alpha_3' => 'DNK',
                'numeric' => 208,
                '3166_2' => 'ISO 3166_2:DK',
            ),
            'provinces' => array(
                'Arhus', 'Bornholm', 'Fredericksberg', 'Frederiksborg', 'Fyn', 'Kobenhavn', 'Kobenhavns', 'Nordjylland', 'Ribe', 'Ringkobing', 'Roskilde', 'Sonderjylland', 'Storstrom', 'Vejle', 'Vestsjalland', 'Viborg',
            ),
        ),
        'DJI' => array(
            'name' => 'Djibouti',
            'country_code' => 253,
            'iso' => array(
                'alpha_2' => 'DJ',
                'alpha_3' => 'DJI',
                'numeric' => 262,
                '3166_2' => 'ISO 3166_2:DJ',
            ),
            'provinces' => array(
                '&#8217;Ali Sabih', 'Dikhil', 'Djibouti', 'Obock', 'Tadjoura',
            ),
        ),
        'DMA' => array(
            'name' => 'Dominica',
            'country_code' => '1 767',
            'iso' => array(
                'alpha_2' => 'DM',
                'alpha_3' => 'DMA',
                'numeric' => 212,
                '3166_2' => 'ISO 3166_2:DM',
            ),
            'provinces' => array(
                'Saint Andrew', 'Saint David', 'Saint George', 'Saint John', 'Saint Joseph', 'Saint Luke', 'Saint Mark', 'Saint Patrick', 'Saint Paul', 'Saint Peter',
            ),
        ),
        'DOM' => array(
            'name' => 'Dominican Republic',
            'country_code' => '1 809',
            'iso' => array(
                'alpha_2' => 'DO',
                'alpha_3' => 'DOM',
                'numeric' => 214,
                '3166_2' => 'ISO 3166_2:DO',
            ),
            'provinces' => array(
                'Azua', 'Baoruco', 'Barahona', 'Dajabon', 'Distrito Nacional', 'Duarte', 'El Seibo', 'Elias Pina', 'Espaillat', 'Hato Mayor', 'Independencia', 'La Altagracia', 'La Romana', 'La Vega', 'Maria Trinidad Sanchez', 'Monsenor Nouel', 'Monte Cristi', 'Monte Plata', 'Pedernales', 'Peravia', 'Puerto Plata', 'Salcedo', 'Samana', 'San Cristobal', 'San Juan', 'San Pedro de Macoris', 'Sanchez Ramirez', 'Santiago', 'Santiago Rodriguez', 'Valverde',
            ),
        ),
        'ECU' => array(
            'name' => 'Ecuador',
            'country_code' => 593,
            'iso' => array(
                'alpha_2' => 'EC',
                'alpha_3' => 'ECU',
                'numeric' => 218,
                '3166_2' => 'ISO 3166_2:EC',
            ),
            'provinces' => array(
                'Azuay', 'Bolivar', 'Canar', 'Carchi', 'Chimborazo', 'Cotopaxi', 'El Oro', 'Esmeraldas', 'Galapagos', 'Guayas', 'Imbabura', 'Loja', 'Los Rios', 'Manabi', 'Morona-Santiago', 'Napo', 'Orellana', 'Pastaza', 'Pichincha', 'Sucumbios', 'Tungurahua', 'Zamora-Chinchipe',
            ),
        ),
        'EGY' => array(
            'name' => 'Egypt',
            'country_code' => 20,
            'iso' => array(
                'alpha_2' => 'EG',
                'alpha_3' => 'EGY',
                'numeric' => 818,
                '3166_2' => 'ISO 3166_2:EG',
            ),
            'provinces' => array(
                'Ad Daqahliyah', 'Al Bahr al Ahmar', 'Al Buhayrah', 'Al Fayyum', 'Al Gharbiyah', 'Al Iskandariyah', 'Al Isma&#8217;iliyah', 'Al Jizah', 'Al Minufiyah', 'Al Minya', 'Al Qahirah', 'Al Qalyubiyah', 'Al Wadi al Jadid', 'As Suways', 'Ash Sharqiyah', 'Aswan', 'Asyut', 'Bani Suwayf', 'Bur Sa&#8217;id', 'Dumyat', 'Janub Sina&#8217;', 'Kafr ash Shaykh', 'Matruh', 'Qina', 'Shamal Sina&#8217;', 'Suhaj',
            ),
        ),
        'SLV' => array(
            'name' => 'El Salvador',
            'country_code' => 503,
            'iso' => array(
                'alpha_2' => 'SV',
                'alpha_3' => 'SLV',
                'numeric' => 222,
                '3166_2' => 'ISO 3166_2:SV',
            ),
            'provinces' => array(
                'Ahuachapan', 'Cabanas', 'Chalatenango', 'Cuscatlan', 'La Libertad', 'La Paz', 'La Union', 'Morazan', 'San Miguel', 'San Salvador', 'San Vicente', 'Santa Ana', 'Sonsonate', 'Usulutan',
            ),
        ),
        'GNQ' => array(
            'name' => 'Equatorial Guinea',
            'country_code' => 240,
            'iso' => array(
                'alpha_2' => 'GQ',
                'alpha_3' => 'GNQ',
                'numeric' => 226,
                '3166_2' => 'ISO 3166_2:GQ',
            ),
            'provinces' => array(
                'Annobon', 'Bioko Norte', 'Bioko Sur', 'Centro Sur', 'Kie-Ntem', 'Litoral', 'Wele-Nzas',
            ),
        ),
        'ERI' => array(
            'name' => 'Eritrea',
            'country_code' => 291,
            'iso' => array(
                'alpha_2' => 'ER',
                'alpha_3' => 'ERI',
                'numeric' => 232,
                '3166_2' => 'ISO 3166_2:ER',
            ),
            'provinces' => array(
                'Akale Guzay', 'Barka', 'Denkel', 'Hamasen', 'Sahil', 'Semhar', 'Senhit', 'Seraye',
            ),
        ),
        'EST' => array(
            'name' => 'Estonia',
            'country_code' => 372,
            'iso' => array(
                'alpha_2' => 'EE',
                'alpha_3' => 'EST',
                'numeric' => 233,
                '3166_2' => 'ISO 3166_2:EE',
            ),
            'provinces' => array(
                'Harjumaa (Tallinn)', 'Hiiumaa (Kardla)', 'Ida-Virumaa (Johvi)', 'Jarvamaa (Paide)', 'Jogevamaa (Jogeva)', 'Laane-Virumaa (Rakvere)', 'Laanemaa (Haapsalu)', 'Parnumaa (Parnu)', 'Polvamaa (Polva)', 'Raplamaa (Rapla)', 'Saaremaa (Kuessaare)', 'Tartumaa (Tartu)', 'Valgamaa (Valga)', 'Viljandimaa (Viljandi)', 'Vorumaa (Voru)',
            ),
        ),
        'ETH' => array(
            'name' => 'Ethiopia',
            'country_code' => 251,
            'iso' => array(
                'alpha_2' => 'ET',
                'alpha_3' => 'ETH',
                'numeric' => 231,
                '3166_2' => 'ISO 3166_2:ET',
            ),
            'provinces' => array(
                'Adis Abeba (Addis Ababa)', 'Afar', 'Amara', 'Dire Dawa', 'Gambela Hizboch', 'Hareri Hizb', 'Oromiya', 'Sumale', 'Tigray', 'YeDebub Biheroch Bihereseboch na Hizboch',
            ),
        ),
        'FLK' => array(
            'name' => 'Falkland Islands (Malvinas)',
            'country_code' => 500,
            'iso' => array(
                'alpha_2' => 'FK',
                'alpha_3' => 'FLK',
                'numeric' => 238,
                '3166_2' => 'ISO 3166_2:FK',
            ),
            'provinces' => array(
                'Falkland Islands (Islas Malvinas)'
            ),
        ),
        'FRO' => array(
            'name' => 'Faroe Islands',
            'country_code' => 298,
            'iso' => array(
                'alpha_2' => 'FO',
                'alpha_3' => 'FRO',
                'numeric' => 234,
                '3166_2' => 'ISO 3166_2:FO',
            ),
            'provinces' => array(
                'Bordoy', 'Eysturoy', 'Mykines', 'Sandoy', 'Skuvoy', 'Streymoy', 'Suduroy', 'Tvoroyri', 'Vagar',
            ),
        ),
        'FJI' => array(
            'name' => 'Fiji',
            'country_code' => 679,
            'iso' => array(
                'alpha_2' => 'FJ',
                'alpha_3' => 'FJI',
                'numeric' => 242,
                '3166_2' => 'ISO 3166_2:FJ',
            ),
            'provinces' => array(
                'Central', 'Eastern', 'Northern', 'Rotuma', 'Western',
            ),
        ),
        'FIN' => array(
            'name' => 'Finland',
            'country_code' => 358,
            'iso' => array(
                'alpha_2' => 'FI',
                'alpha_3' => 'FIN',
                'numeric' => 246,
                '3166_2' => 'ISO 3166_2:FI',
            ),
            'provinces' => array(
                'Aland', 'Etela-Suomen Laani', 'Ita-Suomen Laani', 'Lansi-Suomen Laani', 'Lappi', 'Oulun Laani',
            ),
        ),
        'FRA' => array(
            'name' => 'France',
            'country_code' => 33,
            'iso' => array(
                'alpha_2' => 'FR',
                'alpha_3' => 'FRA',
                'numeric' => 250,
                '3166_2' => 'ISO 3166_2:FR',
            ),
            'provinces' => array(
                'Alsace', 'Aquitaine', 'Auvergne', 'Basse-Normandie', 'Bourgogne', 'Bretagne', 'Centre', 'Champagne-Ardenne', 'Corse', 'Franche-Comte', 'Haute-Normandie', 'Ile-de-France', 'Languedoc-Roussillon', 'Limousin', 'Lorraine', 'Midi-Pyrenees', 'Nord-Pas-de-Calais', 'Pays de la Loire', 'Picardie', 'Poitou-Charentes', 'Provence-Alpes-Cote d&#8217;Azur', 'Rhone-Alpes',
            ),
        ),
        'GUF' => array(
            'name' => 'French Guiana',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'GF',
                'alpha_3' => 'GUF',
                'numeric' => 254,
                '3166_2' => 'ISO 3166_2:GF',
            ),
            'provinces' => array(
                'French Guiana'
            ),
        ),
        'PYF' => array(
            'name' => 'French Polynesia',
            'country_code' => 689,
            'iso' => array(
                'alpha_2' => 'PF',
                'alpha_3' => 'PYF',
                'numeric' => 258,
                '3166_2' => 'ISO 3166_2:PF',
            ),
            'provinces' => array(
                'Archipel des Marquises', 'Archipel des Tuamotu', 'Archipel des Tubuai', 'Iles du Vent', 'Iles Sous-le-Vent',
            ),
        ),
        'ATF' => array(
            'name' => 'French Southern Territories',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'TF',
                'alpha_3' => 'ATF',
                'numeric' => 260,
                '3166_2' => '',
            ),
            'provinces' => array(
                'Adelie Land', 'Ile Crozet', 'Iles Kerguelen', 'Iles Saint-Paul et Amsterdam',
            ),
        ),
        'GAB' => array(
            'name' => 'Gabon',
            'country_code' => 241,
            'iso' => array(
                'alpha_2' => 'GA',
                'alpha_3' => 'GAB',
                'numeric' => 266,
                '3166_2' => 'ISO 3166_2:GA',
            ),
            'provinces' => array(
                'Estuaire', 'Haut-Ogooue', 'Moyen-Ogooue', 'Ngounie', 'Nyanga', 'Ogooue-Ivindo', 'Ogooue-Lolo', 'Ogooue-Maritime', 'Woleu-Ntem',
            ),
        ),
        'GMB' => array(
            'name' => 'Gambia',
            'country_code' => 220,
            'iso' => array(
                'alpha_2' => 'GM',
                'alpha_3' => 'GMB',
                'numeric' => 270,
                '3166_2' => 'ISO 3166_2:GM',
            ),
            'provinces' => array(
                'Banjul', 'Central River', 'Lower River', 'North Bank', 'Upper River', 'Western',
            ),
        ),
        'GEO' => array(
            'name' => 'Georgia',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'GE',
                'alpha_3' => 'GEO',
                'numeric' => 268,
                '3166_2' => 'ISO 3166_2:GE',
            ),
            'provinces' => array(
                'Abashis', 'Abkhazia or Ap&#8217;khazet&#8217;is Avtonomiuri Respublika (Sokhumi)', 'Adigenis', 'Ajaria or Acharis Avtonomiuri Respublika (Bat&#8217;umi)', 'Akhalgoris', 'Akhalk&#8217;alak&#8217;is', 'Akhalts&#8217;ikhis', 'Akhmetis', 'Ambrolauris', 'Aspindzis', 'Baghdat&#8217;is', 'Bolnisis', 'Borjomis', 'Ch&#8217;khorotsqus', 'Ch&#8217;okhatauris', 'Chiat&#8217;ura', 'Dedop&#8217;listsqaros', 'Dmanisis', 'Dushet&#8217;is', 'Gardabanis', 'Gori', 'Goris', 'Gurjaanis', 'Javis', 'K&#8217;arelis', 'K&#8217;ut&#8217;aisi', 'Kaspis', 'Kharagaulis', 'Khashuris', 'Khobis', 'Khonis', 'Lagodekhis', 'Lanch&#8217;khut&#8217;is', 'Lentekhis', 'Marneulis', 'Martvilis', 'Mestiis', 'Mts&#8217;khet&#8217;is', 'Ninotsmindis', 'Onis', 'Ozurget&#8217;is', 'P&#8217;ot&#8217;i', 'Qazbegis', 'Qvarlis', 'Rust&#8217;avi', 'Sach&#8217;kheris', 'Sagarejos', 'Samtrediis', 'Senakis', 'Sighnaghis', 'T&#8217;bilisi', 'T&#8217;elavis', 'T&#8217;erjolis', 'T&#8217;et&#8217;ritsqaros', 'T&#8217;ianet&#8217;is', 'Tqibuli', 'Ts&#8217;ageris', 'Tsalenjikhis', 'Tsalkis', 'Tsqaltubo', 'Vanis', 'Zestap&#8217;onis', 'Zugdidi', 'Zugdidis'
            ),
        ),
        'DEU' => array(
            'name' => 'Germany',
            'country_code' => 49,
            'iso' => array(
                'alpha_2' => 'DE',
                'alpha_3' => 'DEU',
                'numeric' => 276,
                '3166_2' => 'ISO 3166_2:DE',
            ),
            'provinces' => array(
                'Brandenburg', 'Berlin', 'Baden-W\xfcrttemberg', 'Bayern (Bavaria)', 'Bremen', 'Hessen', 'Hamburg', 'Mecklenburg-Vorpommern', 'Niedersachsen (Lower Saxony)', 'Nordrhein-Westfalen', 'Rheinland-Pfalz (Palatinate)', 'Schleswig-Holstein', 'Saarland', 'Sachsen (Saxony)', 'Sachsen-Anhalt (Saxony-Anhalt)', 'Th\xfcringen (Thuringia)',
            ),
        ),
        'GHA' => array(
            'name' => 'Ghana',
            'country_code' => 233,
            'iso' => array(
                'alpha_2' => 'GH',
                'alpha_3' => 'GHA',
                'numeric' => 288,
                '3166_2' => 'ISO 3166_2:GH',
            ),
            'provinces' => array(
                'Ashanti', 'Brong-Ahafo', 'Central', 'Eastern', 'Greater Accra', 'Northern', 'Upper East', 'Upper West', 'Volta', 'Western',
            ),
        ),
        'GIB' => array(
            'name' => 'Gibraltar',
            'country_code' => 350,
            'iso' => array(
                'alpha_2' => 'GI',
                'alpha_3' => 'GIB',
                'numeric' => 292,
                '3166_2' => 'ISO 3166_2:GI',
            ),
            'provinces' => array(
                'Gibraltar'
            ),
        ),
        'GRC' => array(
            'name' => 'Greece',
            'country_code' => 30,
            'iso' => array(
                'alpha_2' => 'GR',
                'alpha_3' => 'GRC',
                'numeric' => 300,
                '3166_2' => 'ISO 3166_2:GR',
            ),
            'provinces' => array(
                'Achaea', 'Aetolia-Acarnania', 'Arcadia', 'Argolis', 'Arta', 'Athens', 'Boeotia', 'Chalcidice', 'Chania', 'Chios', 'Corfu', 'Corinthia', 'Cyclades', 'Dodecanese', 'Drama', 'East Attica', 'Elis', 'Euboea', 'Evros', 'Evrytania', 'Florina', 'Grevena', 'Heraklion', 'Imathia', 'Ioannina', 'Karditsa', 'Kastoria', 'Kavala', 'Kefalonia and Ithaka', 'Kilkis', 'Kozani', 'Laconia', 'Larissa', 'Lasithi', 'Lefkada', 'Lesbos', 'Magnesia', 'Messenia', 'Pella', 'Phocis', 'Phthiotis', 'Pieria', 'Piraeus', 'Preveza', 'Rethymno', 'Rhodope', 'Samos', 'Serres', 'Thesprotia', 'Thessaloniki', 'Trikala', 'West Attica', 'Xanthi', 'Zakynthos',
            ),
        ),
        'GRL' => array(
            'name' => 'Greenland',
            'country_code' => 299,
            'iso' => array(
                'alpha_2' => 'GL',
                'alpha_3' => 'GRL',
                'numeric' => 304,
                '3166_2' => 'ISO 3166_2:GL',
            ),
            'provinces' => array(
                'Avannaa (Nordgronland)', 'Kitaa (Vestgronland)', 'Tunu (Ostgronland)',
            ),
        ),
        'GRD' => array(
            'name' => 'Grenada',
            'country_code' => '1 473',
            'iso' => array(
                'alpha_2' => 'GD',
                'alpha_3' => 'GRD',
                'numeric' => 308,
                '3166_2' => 'ISO 3166_2:GD',
            ),
            'provinces' => array(
                'Carriacou and Petit Martinique', 'Saint Andrew', 'Saint David', 'Saint George', 'Saint John', 'Saint Mark', 'Saint Patrick',
            ),
        ),
        'GLP' => array(
            'name' => 'Guadeloupe',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'GP',
                'alpha_3' => 'GLP',
                'numeric' => 312,
                '3166_2' => 'ISO 3166_2:GP',
            ),
            'provinces' => array(
                'Basse-Terre', 'Grande-Terre', 'Iles de la Petite Terre', 'Iles des Saintes', 'Marie-Galante',
            ),
        ),
        'GUM' => array(
            'name' => 'Guam',
            'country_code' => '1 671',
            'iso' => array(
                'alpha_2' => 'GU',
                'alpha_3' => 'GUM',
                'numeric' => 316,
                '3166_2' => 'ISO 3166_2:GU',
            ),
            'provinces' => array(
                'Guam'
            ),
        ),
        'GTM' => array(
            'name' => 'Guatemala',
            'country_code' => 502,
            'iso' => array(
                'alpha_2' => 'GT',
                'alpha_3' => 'GTM',
                'numeric' => 320,
                '3166_2' => 'ISO 3166_2:GT',
            ),
            'provinces' => array(
                'Alta Verapaz', 'Baja Verapaz', 'Chimaltenango', 'Chiquimula', 'El Progreso', 'Escuintla', 'Guatemala', 'Huehuetenango', 'Izabal', 'Jalapa', 'Jutiapa', 'Peten', 'Quetzaltenango', 'Quiche', 'Retalhuleu', 'Sacatepequez', 'San Marcos', 'Santa Rosa', 'Solola', 'Suchitepequez', 'Totonicapan', 'Zacapa',
            ),
        ),
        'GGY' => array(
            'name' => 'Guernsey',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'GG',
                'alpha_3' => 'GGY',
                'numeric' => 831,
                '3166_2' => 'ISO 3166_2:GG',
            ),
            'provinces' => array(
                'Castel', 'Forest', 'St. Andrew', 'St. Martin', 'St. Peter Port', 'St. Pierre du Bois', 'St. Sampson', 'St. Saviour', 'Torteval', 'Vale',
            ),
        ),
        'GIN' => array(
            'name' => 'Guinea',
            'country_code' => 224,
            'iso' => array(
                'alpha_2' => 'GN',
                'alpha_3' => 'GIN',
                'numeric' => 324,
                '3166_2' => 'ISO 3166_2:GN',
            ),
            'provinces' => array(
                'Beyla', 'Boffa', 'Boke', 'Conakry', 'Coyah', 'Dabola', 'Dalaba', 'Dinguiraye', 'Dubreka', 'Faranah', 'Forecariah', 'Fria', 'Gaoual', 'Gueckedou', 'Kankan', 'Kerouane', 'Kindia', 'Kissidougou', 'Koubia', 'Koundara', 'Kouroussa', 'Labe', 'Lelouma', 'Lola', 'Macenta', 'Mali', 'Mamou', 'Mandiana', 'Nzerekore', 'Pita', 'Siguiri', 'Telimele', 'Tougue', 'Yomou',
            ),
        ),
        'GNB' => array(
            'name' => 'Guinea-Bissau',
            'country_code' => 245,
            'iso' => array(
                'alpha_2' => 'GW',
                'alpha_3' => 'GNB',
                'numeric' => 624,
                '3166_2' => 'ISO 3166_2:GW',
            ),
            'provinces' => array(
                'Bafata', 'Biombo', 'Bissau', 'Bolama-Bijagos', 'Cacheu', 'Gabu', 'Oio', 'Quinara', 'Tombali',
            ),
        ),
        'GUY' => array(
            'name' => 'Guyana',
            'country_code' => 592,
            'iso' => array(
                'alpha_2' => 'GY',
                'alpha_3' => 'GUY',
                'numeric' => 328,
                '3166_2' => 'ISO 3166_2:GY',
            ),
            'provinces' => array(
                'Barima-Waini', 'Cuyuni-Mazaruni', 'Demerara-Mahaica', 'East Berbice-Corentyne', 'Essequibo Islands-West Demerara', 'Mahaica-Berbice', 'Pomeroon-Supenaam', 'Potaro-Siparuni', 'Upper Demerara-Berbice', 'Upper Takutu-Upper Essequibo',
            ),
        ),
        'HTI' => array(
            'name' => 'Haiti',
            'country_code' => 509,
            'iso' => array(
                'alpha_2' => 'HT',
                'alpha_3' => 'HTI',
                'numeric' => 332,
                '3166_2' => 'ISO 3166_2:HT',
            ),
            'provinces' => array(
                'Artibonite', 'Centre', 'Grand&#8217;Anse', 'Nord', 'Nord-Est', 'Nord-Ouest', 'Ouest', 'Sud', 'Sud-Est',
            ),
        ),
        'HMD' => array(
            'name' => 'Heard Island and McDonald Islands',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'HM',
                'alpha_3' => 'HMD',
                'numeric' => 334,
                '3166_2' => 'ISO 3166_2:HM',
            ),
            'provinces' => array(
                'Heard Island and McDonald Islands'
            ),
        ),
        'VAT' => array(
            'name' => 'Holy See, Vatican City State',
            'country_code' => 39,
            'iso' => array(
                'alpha_2' => 'VA',
                'alpha_3' => 'VAT',
                'numeric' => 336,
                '3166_2' => 'ISO 3166_2:VA',
            ),
            'provinces' => array(
                'Holy See (Vatican City)'
            ),
        ),
        'HND' => array(
            'name' => 'Honduras',
            'country_code' => 504,
            'iso' => array(
                'alpha_2' => 'HN',
                'alpha_3' => 'HND',
                'numeric' => 340,
                '3166_2' => 'ISO 3166_2:HN',
            ),
            'provinces' => array(
                'Atlantida', 'Choluteca', 'Colon', 'Comayagua', 'Copan', 'Cortes', 'El Paraiso', 'Francisco Morazan', 'Gracias a Dios', 'Intibuca', 'Islas de la Bahia', 'La Paz', 'Lempira', 'Ocotepeque', 'Olancho', 'Santa Barbara', 'Valle', 'Yoro',
            ),
        ),
        'HKG' => array(
            'name' => 'Hong Kong',
            'country_code' => 852,
            'iso' => array(
                'alpha_2' => 'HK',
                'alpha_3' => 'HKG',
                'numeric' => 344,
                '3166_2' => 'ISO 3166_2:HK',
            ),
            'provinces' => array(
                'Hong Kong'
            ),
        ),
        'HUN' => array(
            'name' => 'Hungary',
            'country_code' => 36,
            'iso' => array(
                'alpha_2' => 'HU',
                'alpha_3' => 'HUN',
                'numeric' => 348,
                '3166_2' => 'ISO 3166_2:HU',
            ),
            'provinces' => array(
                'Bacs-Kiskun', 'Baranya', 'Bekes', 'Bekescsaba', 'Borsod-Abauj-Zemplen', 'Budapest', 'Csongrad', 'Debrecen', 'Dunaujvaros', 'Eger', 'Fejer', 'Gyor', 'Gyor-Moson-Sopron', 'Hajdu-Bihar', 'Heves', 'Hodmezovasarhely', 'Jasz-Nagykun-Szolnok', 'Kaposvar', 'Kecskemet', 'Komarom-Esztergom', 'Miskolc', 'Nagykanizsa', 'Nograd', 'Nyiregyhaza', 'Pecs', 'Pest', 'Somogy', 'Sopron', 'Szabolcs-Szatmar-Bereg', 'Szeged', 'Szekesfehervar', 'Szolnok', 'Szombathely', 'Tatabanya', 'Tolna', 'Vas', 'Veszprem', 'Veszprem', 'Zala', 'Zalaegerszeg',
            ),
        ),
        'ISL' => array(
            'name' => 'Iceland',
            'country_code' => 354,
            'iso' => array(
                'alpha_2' => 'IS',
                'alpha_3' => 'ISL',
                'numeric' => 352,
                '3166_2' => 'ISO 3166_2:IS',
            ),
            'provinces' => array(
                'Akranes', 'Akureyri', 'Arnessysla', 'Austur-Bardhastrandarsysla', 'Austur-Hunavatnssysla', 'Austur-Skaftafellssysla', 'Borgarfjardharsysla', 'Dalasysla', 'Eyjafjardharsysla', 'Gullbringusysla', 'Hafnarfjordhur', 'Husavik', 'Isafjordhur', 'Keflavik', 'Kjosarsysla', 'Kopavogur', 'Myrasysla', 'Neskaupstadhur', 'Nordhur-Isafjardharsysla', 'Nordhur-Mulasys-la', 'Nordhur-Thingeyjarsysla', 'Olafsfjordhur', 'Rangarvallasysla', 'Reykjavik', 'Saudharkrokur', 'Seydhisfjordhur', 'Siglufjordhur', 'Skagafjardharsysla', 'Snaefellsnes-og Hnappadalssysla', 'Strandasysla', 'Sudhur-Mulasysla', 'Sudhur-Thingeyjarsysla', 'Vesttmannaeyjar', 'Vestur-Bardhastrandarsysla', 'Vestur-Hunavatnssysla', 'Vestur-Isafjardharsysla', 'Vestur-Skaftafellssysla',
            ),
        ),
        'IND' => array(
            'name' => 'India',
            'country_code' => 91,
            'iso' => array(
                'alpha_2' => 'IN',
                'alpha_3' => 'IND',
                'numeric' => 356,
                '3166_2' => 'ISO 3166_2:IN',
            ),
            'provinces' => array(
                'Andaman and Nicobar Islands', 'Andhra Pradesh', 'Arunachal Pradesh', 'Assam', 'Bihar', 'Chandigarh', 'Chhattisgarh', 'Dadra and Nagar Haveli', 'Daman and Diu', 'Delhi', 'Goa', 'Gujarat', 'Haryana', 'Himachal Pradesh', 'Jammu and Kashmir', 'Jharkhand', 'Karnataka', 'Kerala', 'Lakshadweep', 'Madhya Pradesh', 'Maharashtra', 'Manipur', 'Meghalaya', 'Mizoram', 'Nagaland', 'Orissa', 'Pondicherry', 'Punjab', 'Rajasthan', 'Sikkim', 'Tamil Nadu', 'Tripura', 'Uttar Pradesh', 'Uttaranchal', 'West Bengal',
            ),
        ),
        'IDN' => array(
            'name' => 'Indonesia',
            'country_code' => 62,
            'iso' => array(
                'alpha_2' => 'ID',
                'alpha_3' => 'IDN',
                'numeric' => 360,
                '3166_2' => 'ISO 3166_2:ID',
            ),
            'provinces' => array(
                'Aceh', 'Bali', 'Banten', 'Bengkulu', 'East Timor', 'Gorontalo', 'Irian Jaya', 'Jakarta Raya', 'Jambi', 'Jawa Barat', 'Jawa Tengah', 'Jawa Timur', 'Kalimantan Barat', 'Kalimantan Selatan', 'Kalimantan Tengah', 'Kalimantan Timur', 'Kepulauan Bangka Belitung', 'Lampung', 'Maluku', 'Maluku Utara', 'Nusa Tenggara Barat', 'Nusa Tenggara Timur', 'Riau', 'Sulawesi Selatan', 'Sulawesi Tengah', 'Sulawesi Tenggara', 'Sulawesi Utara', 'Sumatera Barat', 'Sumatera Selatan', 'Sumatera Utara', 'Yogyakarta',
            ),
        ),
        'IRN' => array(
            'name' => 'Iran Islamic Republic of',
            'country_code' => 98,
            'iso' => array(
                'alpha_2' => 'IR',
                'alpha_3' => 'IRN',
                'numeric' => 364,
                '3166_2' => 'ISO 3166_2:IR',
            ),
            'provinces' => array(
                'Ardabil', 'Azarbayjan-e Gharbi', 'Azarbayjan-e Sharqi', 'Bushehr', 'Chahar Mahall va Bakhtiari', 'Esfahan', 'Fars', 'Gilan', 'Golestan', 'Hamadan', 'Hormozgan', 'Ilam', 'Kerman', 'Kermanshah', 'Khorasan', 'Khuzestan', 'Kohgiluyeh va Buyer Ahmad', 'Kordestan', 'Lorestan', 'Markazi', 'Mazandaran', 'Qazvin', 'Qom', 'Semnan', 'Sistan va Baluchestan', 'Tehran', 'Yazd', 'Zanjan',
            ),
        ),
        'IRQ' => array(
            'name' => 'Iraq',
            'country_code' => 964,
            'iso' => array(
                'alpha_2' => 'IQ',
                'alpha_3' => 'IRQ',
                'numeric' => 368,
                '3166_2' => 'ISO 3166_2:IQ',
            ),
            'provinces' => array(
                'Al Anbar', 'Al Basrah', 'Al Muthanna', 'Al Qadisiyah', 'An Najaf', 'Arbil', 'As Sulaymaniyah', 'At Ta&#8217;mim', 'Babil', 'Baghdad', 'Dahuk', 'Dhi Qar', 'Diyala', 'Karbala&#8217;', 'Maysan', 'Ninawa', 'Salah ad Din', 'Wasit',
            ),
        ),
        'IRL' => array(
            'name' => 'Ireland',
            'country_code' => 353,
            'iso' => array(
                'alpha_2' => 'IE',
                'alpha_3' => 'IRL',
                'numeric' => 372,
                '3166_2' => 'ISO 3166_2:IE',
            ),
            'provinces' => array(
                'Co. Carlow', 'Co. Cavan', 'Co. Clare', 'Co. Cork', 'Co. Donegal', 'Co. Dublin', 'Co. Galway', 'Co. Kerry', 'Co. Kildare', 'Co. Kilkenny', 'Co. Laois', 'Co. Leitrim', 'Co. Limerick', 'Co. Longford', 'Co. Louth', 'Co. Mayo', 'Co. Meath', 'Co. Monaghan', 'Co. Offaly', 'Co. Roscommon', 'Co. Sligo', 'Co. Tipperary', 'Co. Waterford', 'Co. Westmeath', 'Co. Wexford', 'Co. Wicklow',
            ),
        ),
        'IMN' => array(
            'name' => 'Isle of Man',
            'country_code' => 44,
            'iso' => array(
                'alpha_2' => 'IM',
                'alpha_3' => 'IMN',
                'numeric' => 833,
                '3166_2' => 'ISO 3166_2:IM',
            ),
            'provinces' => array(
                'Isle of Man'
            ),
        ),
        'ISR' => array(
            'name' => 'Israel',
            'country_code' => 972,
            'iso' => array(
                'alpha_2' => 'IL',
                'alpha_3' => 'ISR',
                'numeric' => 376,
                '3166_2' => 'ISO 3166_2:IL',
            ),
            'provinces' => array(
                'Central', 'Haifa', 'Jerusalem', 'Northern', 'Southern', 'Tel Aviv',
            ),
        ),
        'ITA' => array(
            'name' => 'Italy',
            'country_code' => 39,
            'iso' => array(
                'alpha_2' => 'IT',
                'alpha_3' => 'ITA',
                'numeric' => 380,
                '3166_2' => 'ISO 3166_2:IT',
            ),
            'provinces' => array(
                'Agrigento', 'Alessandria', 'Ancona', 'Aosta', 'Ascoli Piceno', 'L&#8217;Aquila', 'Arezzo', 'Asti', 'Avellino', 'Bari', 'Bergamo', 'Biella', 'Belluno', 'Benevento', 'Bologna', 'Brindisi', 'Brescia', 'Barletta-Andria-Trani', 'Bolzano-Bozen', 'Cagliari', 'Campobasso', 'Caserta', 'Chieti', 'Carbonia-Inglesias', 'Caltanissetta', 'Cuneo', 'Como', 'Cremona', 'Cosenza', 'Catania', 'Catanzaro', 'Enna', 'Forl\xec-Cesena', 'Ferrara', 'Foggia', 'Firenze', 'Fermo', 'Frosinone', 'Genova', 'Gorizia', 'Grosseto', 'Imperia', 'Isernia', 'Crotone', 'Lecco', 'Lecce', 'Livorno', 'Lodi', 'Latina', 'Lucca', 'Monza e Brianza', 'Macerata', 'Messina', 'Milano', 'Mantova', 'Modena', 'Massa-Carrara', 'Matera', 'Napoli', 'Novara', 'Nuoro', 'Ogliastra', 'Oristano', 'Olbia-Tempio', 'Palermo', 'Piacenza', 'Padova', 'Pescara', 'Perugia', 'Pisa', 'Pordenone', 'Prato', 'Parma', 'Pistoia', 'Pesaro e Urbino', 'Pavia', 'Potenza', 'Ravenna', 'Reggio Calabria', 'Reggio Elilia', 'Ragusa', 'Rieti', 'Roma', 'Rimini', 'Rovigo', 'Salerno', 'Siena', 'Sondrio', 'La Spezia', 'Siracusa', 'Sassari', 'Savona', 'Taranto', 'Teramo', 'Trento', 'Torino', 'Trapani', 'Terni', 'Trieste', 'Treviso', 'Udine', 'Varese', 'Verbano-Cusio-Ossola', 'Vercelli', 'Venezia', 'Vicenza', 'Verona', 'Medio Campidano', 'Viterbo', 'Vibo Valentia',
            ),
        ),
        'JAM' => array(
            'name' => 'Jamaica',
            'country_code' => '1 876',
            'iso' => array(
                'alpha_2' => 'JM',
                'alpha_3' => 'JAM',
                'numeric' => 388,
                '3166_2' => 'ISO 3166_2:JM',
            ),
            'provinces' => array(
                'Clarendon', 'Hanover', 'Kingston', 'Manchester', 'Portland', 'Saint Andrew', 'Saint Ann', 'Saint Catherine', 'Saint Elizabeth', 'Saint James', 'Saint Mary', 'Saint Thomas', 'Trelawny', 'Westmoreland',
            ),
        ),
        'JPN' => array(
            'name' => 'Japan',
            'country_code' => 81,
            'iso' => array(
                'alpha_2' => 'JP',
                'alpha_3' => 'JPN',
                'numeric' => 392,
                '3166_2' => 'ISO 3166_2:JP',
            ),
            'provinces' => array(
                'Aichi', 'Akita', 'Aomori', 'Chiba', 'Ehime', 'Fukui', 'Fukuoka', 'Fukushima', 'Gifu', 'Gunma', 'Hiroshima', 'Hokkaido', 'Hyogo', 'Ibaragi', 'Ishikawa', 'Iwate', 'Kagawa', 'Kagoshima', 'Kanagawa', 'Kochi', 'Kumamoto', 'Kyoto', 'Mie', 'Miyagi', 'Miyazaki', 'Nagano', 'Nagasaki', 'Nara', 'Niigata', 'Oita', 'Okayama', 'Okinawa', 'Osaka', 'Saga', 'Saitama', 'Shiga', 'Shimane', 'Shizuoka', 'Tochigi', 'Tokushima', 'Tokyo', 'Tottori', 'Toyama', 'Wakayama', 'Yamagata', 'Yamaguchi', 'Yamanashi',
            ),
        ),
        'JEY' => array(
            'name' => 'Jersey',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'JE',
                'alpha_3' => 'JEY',
                'numeric' => 832,
                '3166_2' => 'ISO 3166_2:JE',
            ),
            'provinces' => array(
                'Jersey'
            ),
        ),
        'JOR' => array(
            'name' => 'Jordan',
            'country_code' => 962,
            'iso' => array(
                'alpha_2' => 'JO',
                'alpha_3' => 'JOR',
                'numeric' => 400,
                '3166_2' => 'ISO 3166_2:JO',
            ),
            'provinces' => array(
                '&#8217;Amman', 'Ajlun', 'Al &#8217;Aqabah', 'Al Balqa&#8217;', 'Al Karak', 'Al Mafraq', 'At Tafilah', 'Az Zarqa&#8217;', 'Irbid', 'Jarash', 'Ma&#8217;an', 'Madaba',
            ),
        ),
        'KAZ' => array(
            'name' => 'Kazakhstan',
            'country_code' => 7,
            'iso' => array(
                'alpha_2' => 'KZ',
                'alpha_3' => 'KAZ',
                'numeric' => 398,
                '3166_2' => 'ISO 3166_2:KZ',
            ),
            'provinces' => array(
                'Almaty', 'Aqmola', 'Aqtobe', 'Astana', 'Atyrau', 'Batys Qazaqstan', 'Bayqongyr', 'Mangghystau', 'Ongtustik Qazaqstan', 'Pavlodar', 'Qaraghandy', 'Qostanay', 'Qyzylorda', 'Shyghys Qazaqstan', 'Soltustik Qazaqstan', 'Zhambyl',
            ),
        ),
        'KEN' => array(
            'name' => 'Kenya',
            'country_code' => 254,
            'iso' => array(
                'alpha_2' => 'KE',
                'alpha_3' => 'KEN',
                'numeric' => 404,
                '3166_2' => 'ISO 3166_2:KE',
            ),
            'provinces' => array(
                'Central', 'Coast', 'Eastern', 'Nairobi Area', 'North Eastern', 'Nyanza', 'Rift Valley', 'Western',
            ),
        ),
        'KIR' => array(
            'name' => 'Kiribati',
            'country_code' => 686,
            'iso' => array(
                'alpha_2' => 'KI',
                'alpha_3' => 'KIR',
                'numeric' => 296,
                '3166_2' => 'ISO 3166_2:KI',
            ),
            'provinces' => array(
                'Abaiang', 'Abemama', 'Aranuka', 'Arorae', 'Banaba', 'Banaba', 'Beru', 'Butaritari', 'Central Gilberts', 'Gilbert Islands', 'Kanton', 'Kiritimati', 'Kuria', 'Line Islands', 'Line Islands', 'Maiana', 'Makin', 'Marakei', 'Nikunau', 'Nonouti', 'Northern Gilberts', 'Onotoa', 'Phoenix Islands', 'Southern Gilberts', 'Tabiteuea', 'Tabuaeran', 'Tamana', 'Tarawa', 'Tarawa', 'Teraina',
            ),
        ),
        'PRK' => array(
            'name' => 'Korea, Democratic People&#8217;s Republic of',
            'country_code' => 850,
            'iso' => array(
                'alpha_2' => 'KP',
                'alpha_3' => 'PRK',
                'numeric' => 408,
                '3166_2' => 'ISO 3166_2:KP',
            ),
            'provinces' => array(
                'Chagang-do (Chagang Province)', 'Hamgyong-bukto (North Hamgyong Province)', 'Hamgyong-namdo (South Hamgyong Province)', 'Hwanghae-bukto (North Hwanghae Province)', 'Hwanghae-namdo (South Hwanghae Province)', 'Kaesong-si (Kaesong City)', 'Kangwon-do (Kangwon Province)', 'Namp&#8217;o-si (Namp&#8217;o City)', 'P&#8217;yongan-bukto (North P&#8217;yongan Province)', 'P&#8217;yongan-namdo (South P&#8217;yongan Province)', 'P&#8217;yongyang-si (P&#8217;yongyang City)', 'Yanggang-do (Yanggang Province)',
            ),
        ),
        'KOR' => array(
            'name' => 'Korea, Republic of',
            'country_code' => 82,
            'iso' => array(
                'alpha_2' => 'KR',
                'alpha_3' => 'KOR',
                'numeric' => 410,
                '3166_2' => 'ISO 3166_2:KR',
            ),
            'provinces' => array(
                'Ch&#8217;ungch&#8217;ong-bukto', 'Ch&#8217;ungch&#8217;ong-namdo', 'Cheju-do', 'Cholla-bukto', 'Cholla-namdo', 'Inch&#8217;on-gwangyoksi', 'Kangwon-do', 'Kwangju-gwangyoksi', 'Kyonggi-do', 'Kyongsang-bukto', 'Kyongsang-namdo', 'Pusan-gwangyoksi', 'Soul-t&#8217;ukpyolsi', 'Taegu-gwangyoksi', 'Taejon-gwangyoksi', 'Ulsan-gwangyoksi',
            ),
        ),
        'KWT' => array(
            'name' => 'Kuwait',
            'country_code' => 965,
            'iso' => array(
                'alpha_2' => 'KW',
                'alpha_3' => 'KWT',
                'numeric' => 414,
                '3166_2' => 'ISO 3166_2:KW',
            ),
            'provinces' => array(
                'Al &#8217;Asimah', 'Al Ahmadi', 'Al Farwaniyah', 'Al Jahra&#8217;', 'Hawalli',
            ),
        ),
        'KGZ' => array(
            'name' => 'Kyrgyzstan',
            'country_code' => 996,
            'iso' => array(
                'alpha_2' => 'KG',
                'alpha_3' => 'KGZ',
                'numeric' => 417,
                '3166_2' => 'ISO 3166_2:KG',
            ),
            'provinces' => array(
                'Batken Oblasty', 'Bishkek Shaary', 'Chuy Oblasty (Bishkek)', 'Jalal-Abad Oblasty', 'Naryn Oblasty', 'Osh Oblasty', 'Talas Oblasty', 'Ysyk-Kol Oblasty (Karakol)',
            ),
        ),
        'LAO' => array(
            'name' => 'Lao People&#8217;s Democratic Republic',
            'country_code' => 856,
            'iso' => array(
                'alpha_2' => 'LA',
                'alpha_3' => 'LAO',
                'numeric' => 418,
                '3166_2' => 'ISO 3166_2:LA',
            ),
            'provinces' => array(
                'Attapu', 'Bokeo', 'Bolikhamxai', 'Champasak', 'Houaphan', 'Khammouan', 'Louangnamtha', 'Louangphabang', 'Oudomxai', 'Phongsali', 'Salavan', 'Savannakhet', 'Viangchan', 'Viangchan', 'Xaignabouli', 'Xaisomboun', 'Xekong', 'Xiangkhoang',
            ),
        ),
        'LVA' => array(
            'name' => 'Latvia',
            'country_code' => 371,
            'iso' => array(
                'alpha_2' => 'LV',
                'alpha_3' => 'LVA',
                'numeric' => 428,
                '3166_2' => 'ISO 3166_2:LV',
            ),
            'provinces' => array(
                'Aizkraukles Rajons', 'Aluksnes Rajons', 'Balvu Rajons', 'Bauskas Rajons', 'Cesu Rajons', 'Daugavpils', 'Daugavpils Rajons', 'Dobeles Rajons', 'Gulbenes Rajons', 'Jekabpils Rajons', 'Jelgava', 'Jelgavas Rajons', 'Jurmala', 'Kraslavas Rajons', 'Kuldigas Rajons', 'Leipaja', 'Liepajas Rajons', 'Limbazu Rajons', 'Ludzas Rajons', 'Madonas Rajons', 'Ogres Rajons', 'Preilu Rajons', 'Rezekne', 'Rezeknes Rajons', 'Riga', 'Rigas Rajons', 'Saldus Rajons', 'Talsu Rajons', 'Tukuma Rajons', 'Valkas Rajons', 'Valmieras Rajons', 'Ventspils', 'Ventspils Rajons',
            ),
        ),
        'LBN' => array(
            'name' => 'Lebanon',
            'country_code' => 961,
            'iso' => array(
                'alpha_2' => 'LB',
                'alpha_3' => 'LBN',
                'numeric' => 422,
                '3166_2' => 'ISO 3166_2:LB',
            ),
            'provinces' => array(
                'Beyrouth', 'Ech Chimal', 'Ej Jnoub', 'El Bekaa', 'Jabal Loubnane',
            ),
        ),
        'LSO' => array(
            'name' => 'Lesotho',
            'country_code' => 266,
            'iso' => array(
                'alpha_2' => 'LS',
                'alpha_3' => 'LSO',
                'numeric' => 426,
                '3166_2' => 'ISO 3166_2:LS',
            ),
            'provinces' => array(
                'Berea', 'Butha-Buthe', 'Leribe', 'Mafeteng', 'Maseru', 'Mohales Hoek', 'Mokhotlong', 'Qacha&#8217;s Nek', 'Quthing', 'Thaba-Tseka'
            ),
        ),
        'LBR' => array(
            'name' => 'Liberia',
            'country_code' => 231,
            'iso' => array(
                'alpha_2' => 'LR',
                'alpha_3' => 'LBR',
                'numeric' => 430,
                '3166_2' => 'ISO 3166_2:LR',
            ),
            'provinces' => array(
                'Bomi', 'Bong', 'Grand Bassa', 'Grand Cape Mount', 'Grand Gedeh', 'Grand Kru', 'Lofa', 'Margibi', 'Maryland', 'Montserrado', 'Nimba', 'River Cess', 'Sinoe',
            ),
        ),
        'LBY' => array(
            'name' => 'Libyan Arab Jamahiriya',
            'country_code' => 218,
            'iso' => array(
                'alpha_2' => 'LY',
                'alpha_3' => 'LBY',
                'numeric' => 434,
                '3166_2' => 'ISO 3166_2:LY',
            ),
            'provinces' => array(
                'Ajdabiya', 'Al &#8217;Aziziyah', 'Al Fatih', 'Al Jabal al Akhdar', 'Al Jufrah', 'Al Khums', 'Al Kufrah', 'An Nuqat al Khams', 'Ash Shati&#8217;', 'Awbari', 'Az Zawiyah', 'Banghazi', 'Darnah', 'Ghadamis', 'Gharyan', 'Misratah', 'Murzuq', 'Sabha', 'Sawfajjin', 'Surt', 'Tarabulus', 'Tarhunah', 'Tubruq', 'Yafran', 'Zlitan'
            ),
        ),
        'LIE' => array(
            'name' => 'Liechtenstein',
            'country_code' => 423,
            'iso' => array(
                'alpha_2' => 'LI',
                'alpha_3' => 'LIE',
                'numeric' => 438,
                '3166_2' => 'ISO 3166_2:LI',
            ),
            'provinces' => array(
                'Balzers', 'Eschen', 'Gamprin', 'Mauren', 'Planken', 'Ruggell', 'Schaan', 'Schellenberg', 'Triesen', 'Triesenberg', 'Vaduz',
            ),
        ),
        'LTU' => array(
            'name' => 'Lithuania',
            'country_code' => 370,
            'iso' => array(
                'alpha_2' => 'LT',
                'alpha_3' => 'LTU',
                'numeric' => 440,
                '3166_2' => 'ISO 3166_2:LT',
            ),
            'provinces' => array(
                'Akmenes Rajonas', 'Alytaus Rajonas', 'Alytus', 'Anyksciu Rajonas', 'Birstonas', 'Birzu Rajonas', 'Druskininkai', 'Ignalinos Rajonas', 'Jonavos Rajonas', 'Joniskio Rajonas', 'Jurbarko Rajonas', 'Kaisiadoriu Rajonas', 'Kaunas', 'Kauno Rajonas', 'Kedainiu Rajonas', 'Kelmes Rajonas', 'Klaipeda', 'Klaipedos Rajonas', 'Kretingos Rajonas', 'Kupiskio Rajonas', 'Lazdiju Rajonas', 'Marijampole', 'Marijampoles Rajonas', 'Mazeikiu Rajonas', 'Moletu Rajonas', 'Neringa Pakruojo Rajonas', 'Palanga', 'Panevezio Rajonas', 'Panevezys', 'Pasvalio Rajonas', 'Plunges Rajonas', 'Prienu Rajonas', 'Radviliskio Rajonas', 'Raseiniu Rajonas', 'Rokiskio Rajonas', 'Sakiu Rajonas', 'Salcininku Rajonas', 'Siauliai', 'Siauliu Rajonas', 'Silales Rajonas', 'Silutes Rajonas', 'Sirvintu Rajonas', 'Skuodo Rajonas', 'Svencioniu Rajonas', 'Taurages Rajonas', 'Telsiu Rajonas', 'Traku Rajonas', 'Ukmerges Rajonas', 'Utenos Rajonas', 'Varenos Rajonas', 'Vilkaviskio Rajonas', 'Vilniaus Rajonas', 'Vilnius', 'Zarasu Rajonas',
            ),
        ),
        'LUX' => array(
            'name' => 'Luxembourg',
            'country_code' => 352,
            'iso' => array(
                'alpha_2' => 'LU',
                'alpha_3' => 'LUX',
                'numeric' => 442,
                '3166_2' => 'ISO 3166_2:LU',
            ),
            'provinces' => array(
                'Diekirch', 'Grevenmacher', 'Luxembourg',
            ),
        ),
        'MAC' => array(
            'name' => 'Macao',
            'country_code' => 853,
            'iso' => array(
                'alpha_2' => 'MO',
                'alpha_3' => 'MAC',
                'numeric' => 446,
                '3166_2' => 'ISO 3166_2:MO',
            ),
            'provinces' => array(
                'Macao'
            ),
        ),
        'MKD' => array(
            'name' => 'Macedonia',
            'country_code' => 389,
            'iso' => array(
                'alpha_2' => 'MK',
                'alpha_3' => 'MKD',
                'numeric' => 807,
                '3166_2' => 'ISO 3166_2:MK',
            ),
            'provinces' => array(
                'Aracinovo', 'Bac', 'Belcista', 'Berovo', 'Bistrica', 'Bitola', 'Blatec', 'Bogdanci', 'Bogomila', 'Bogovinje', 'Bosilovo', 'Brvenica', 'Cair (Skopje)', 'Capari', 'Caska', 'Cegrane', 'Centar (Skopje)', 'Centar Zupa', 'Cesinovo', 'Cucer-Sandevo', 'Debar', 'Delcevo', 'Delogozdi', 'Demir Hisar', 'Demir Kapija', 'Dobrusevo', 'Dolna Banjica', 'Dolneni', 'Dorce Petrov (Skopje)', 'Drugovo', 'Dzepciste', 'Gazi Baba (Skopje)', 'Gevgelija', 'Gostivar', 'Gradsko', 'Ilinden', 'Izvor', 'Jegunovce', 'Kamenjane', 'Karbinci', 'Karpos (Skopje)', 'Kavadarci', 'Kicevo', 'Kisela Voda (Skopje)', 'Klecevce', 'Kocani', 'Konce', 'Kondovo', 'Konopiste', 'Kosel', 'Kratovo', 'Kriva Palanka', 'Krivogastani', 'Krusevo', 'Kuklis', 'Kukurecani', 'Kumanovo', 'Labunista', 'Lipkovo', 'Lozovo', 'Lukovo', 'Makedonska Kamenica', 'Makedonski Brod', 'Mavrovi Anovi', 'Meseista', 'Miravci', 'Mogila', 'Murtino', 'Negotino', 'Negotino-Poloska', 'Novaci', 'Novo Selo', 'Oblesevo', 'Ohrid', 'Orasac', 'Orizari', 'Oslomej', 'Pehcevo', 'Petrovec', 'Plasnia', 'Podares', 'Prilep', 'Probistip', 'Radovis', 'Rankovce', 'Resen', 'Rosoman', 'Rostusa', 'Samokov', 'Saraj', 'Sipkovica', 'Sopiste', 'Sopotnika', 'Srbinovo', 'Star Dojran', 'Staravina', 'Staro Nagoricane', 'Stip', 'Struga', 'Strumica', 'Studenicani', 'Suto Orizari (Skopje)', 'Sveti Nikole', 'Tearce', 'Tetovo', 'Topolcani', 'Valandovo', 'Vasilevo', 'Veles', 'Velesta', 'Vevcani', 'Vinica', 'Vitoliste', 'Vranestica', 'Vrapciste', 'Vratnica', 'Vrutok', 'Zajas', 'Zelenikovo', 'Zileno', 'Zitose', 'Zletovo', 'Zrnovci',
            ),
        ),
        'MDG' => array(
            'name' => 'Madagascar',
            'country_code' => 261,
            'iso' => array(
                'alpha_2' => 'MG',
                'alpha_3' => 'MDG',
                'numeric' => 450,
                '3166_2' => 'ISO 3166_2:MG',
            ),
            'provinces' => array(
                'Antananarivo', 'Antsiranana', 'Fianarantsoa', 'Mahajanga', 'Toamasina', 'Toliara',
            ),
        ),
        'MWI' => array(
            'name' => 'Malawi',
            'country_code' => 265,
            'iso' => array(
                'alpha_2' => 'MW',
                'alpha_3' => 'MWI',
                'numeric' => 454,
                '3166_2' => 'ISO 3166_2:MW',
            ),
            'provinces' => array(
                'Balaka', 'Blantyre', 'Chikwawa', 'Chiradzulu', 'Chitipa', 'Dedza', 'Dowa', 'Karonga', 'Kasungu', 'Likoma', 'Lilongwe', 'Machinga (Kasupe)', 'Mangochi', 'Mchinji', 'Mulanje', 'Mwanza', 'Mzimba', 'Nkhata Bay', 'Nkhotakota', 'Nsanje', 'Ntcheu', 'Ntchisi', 'Phalombe', 'Rumphi', 'Salima', 'Thyolo', 'Zomba',
            ),
        ),
        'MYS' => array(
            'name' => 'Malaysia',
            'country_code' => 60,
            'iso' => array(
                'alpha_2' => 'MY',
                'alpha_3' => 'MYS',
                'numeric' => 458,
                '3166_2' => 'ISO 3166_2:MY',
            ),
            'provinces' => array(
                'Johor', 'Kedah', 'Kelantan', 'Labuan', 'Melaka', 'Negeri Sembilan', 'Pahang', 'Perak', 'Perlis', 'Pulau Pinang', 'Sabah', 'Sarawak', 'Selangor', 'Terengganu', 'Wilayah Persekutuan',
            ),
        ),
        'MDV' => array(
            'name' => 'Maldives',
            'country_code' => 960,
            'iso' => array(
                'alpha_2' => 'MV',
                'alpha_3' => 'MDV',
                'numeric' => 462,
                '3166_2' => 'ISO 3166_2:MV',
            ),
            'provinces' => array(
                'Alifu', 'Baa', 'Dhaalu', 'Faafu', 'Gaafu Alifu', 'Gaafu Dhaalu', 'Gnaviyani', 'Haa Alifu', 'Haa Dhaalu', 'Kaafu', 'Laamu', 'Lhaviyani', 'Maale', 'Meemu', 'Noonu', 'Raa', 'Seenu', 'Shaviyani', 'Thaa', 'Vaavu',
            ),
        ),
        'MLI' => array(
            'name' => 'Mali',
            'country_code' => 223,
            'iso' => array(
                'alpha_2' => 'ML',
                'alpha_3' => 'MLI',
                'numeric' => 466,
                '3166_2' => 'ISO 3166_2:ML',
            ),
            'provinces' => array(
                'Gao', 'Kayes', 'Kidal', 'Koulikoro', 'Mopti', 'Segou', 'Sikasso', 'Tombouctou',
            ),
        ),
        'MLT' => array(
            'name' => 'Malta',
            'country_code' => 356,
            'iso' => array(
                'alpha_2' => 'MT',
                'alpha_3' => 'MLT',
                'numeric' => 470,
                '3166_2' => 'ISO 3166_2:MT',
            ),
            'provinces' => array(
                'Valletta'
            ),
        ),
        'MH' => array(
            'name' => 'Marshall Islands',
            'country_code' => 692,
            'iso' => array(
                'alpha_2' => 'MH',
                'alpha_3' => 'MHL',
                'numeric' => 584,
                '3166_2' => 'ISO 3166_2:MH',
            ),
            'provinces' => array(
                'Ailinginae', 'Ailinglaplap', 'Ailuk', 'Arno', 'Aur', 'Bikar', 'Bikini', 'Bokak', 'Ebon', 'Enewetak', 'Erikub', 'Jabat', 'Jaluit', 'Jemo', 'Kili', 'Kwajalein', 'Lae', 'Lib', 'Likiep', 'Majuro', 'Maloelap', 'Mejit', 'Mili', 'Namorik', 'Namu', 'Rongelap', 'Rongrik', 'Toke', 'Ujae', 'Ujelang', 'Utirik', 'Wotho', 'Wotje',
            ),
        ),
        'MTQ' => array(
            'name' => 'Martinique',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'MQ',
                'alpha_3' => 'MTQ',
                'numeric' => 474,
                '3166_2' => 'ISO 3166_2:MQ',
            ),
            'provinces' => array(
                'Martinique'
            ),
        ),
        'MRT' => array(
            'name' => 'Mauritania',
            'country_code' => 222,
            'iso' => array(
                'alpha_2' => 'MR',
                'alpha_3' => 'MRT',
                'numeric' => 478,
                '3166_2' => 'ISO 3166_2:MR',
            ),
            'provinces' => array(
                'Adrar', 'Assaba', 'Brakna', 'Dakhlet Nouadhibou', 'Gorgol', 'Guidimaka', 'Hodh Ech Chargui', 'Hodh El Gharbi', 'Inchiri', 'Nouakchott', 'Tagant', 'Tiris Zemmour', 'Trarza',
            ),
        ),
        'MUS' => array(
            'name' => 'Mauritius',
            'country_code' => 230,
            'iso' => array(
                'alpha_2' => 'MU',
                'alpha_3' => 'MUS',
                'numeric' => 480,
                '3166_2' => 'ISO 3166_2:MU',
            ),
            'provinces' => array(
                'Agalega Islands', 'Black River', 'Cargados Carajos Shoals', 'Flacq', 'Grand Port', 'Moka', 'Pamplemousses', 'Plaines Wilhems', 'Port Louis', 'Riviere du Rempart', 'Rodrigues', 'Savanne',
            ),
        ),
        'MYT' => array(
            'name' => 'Mayotte',
            'country_code' => 262,
            'iso' => array(
                'alpha_2' => 'YT',
                'alpha_3' => 'MYT',
                'numeric' => 175,
                '3166_2' => 'ISO 3166_2:YT',
            ),
            'provinces' => array(
                'Mayotte'
            ),
        ),
        'MEX' => array(
            'name' => 'Mexico',
            'country_code' => 52,
            'iso' => array(
                'alpha_2' => 'MX',
                'alpha_3' => 'MEX',
                'numeric' => 484,
                '3166_2' => 'ISO 3166_2:MX',
            ),
            'provinces' => array(
                'Aguascalientes', 'Baja California', 'Baja California Sur', 'Campeche', 'Chiapas', 'Chihuahua', 'Coahuila de Zaragoza', 'Colima', 'Distrito Federal', 'Durango', 'Guanajuato', 'Guerrero', 'Hidalgo', 'Jalisco', 'Mexico', 'Michoacan de Ocampo', 'Morelos', 'Nayarit', 'Nuevo Leon', 'Oaxaca', 'Puebla', 'Queretaro de Arteaga', 'Quintana Roo', 'San Luis Potosi', 'Sinaloa', 'Sonora', 'Tabasco', 'Tamaulipas', 'Tlaxcala', 'Veracruz-Llave', 'Yucatan', 'Zacatecas',
            ),
        ),
        'FSM' => array(
            'name' => 'Micronesia Federated States of',
            'country_code' => 691,
            'iso' => array(
                'alpha_2' => 'FM',
                'alpha_3' => 'FSM',
                'numeric' => 583,
                '3166_2' => 'ISO 3166_2:FM',
            ),
            'provinces' => array(
                'Chuuk (Truk)', 'Kosrae', 'Pohnpei', 'Yap',
            ),
        ),
        'MDA' => array(
            'name' => 'Moldova',
            'country_code' => 373,
            'iso' => array(
                'alpha_2' => 'MD',
                'alpha_3' => 'MDA',
                'numeric' => 498,
                '3166_2' => 'ISO 3166_2:MD',
            ),
            'provinces' => array(
                'Balti', 'Cahul', 'Chisinau', 'Chisinau', 'Dubasari', 'Edinet', 'Gagauzia', 'Lapusna', 'Orhei', 'Soroca', 'Tighina', 'Ungheni',
            ),
        ),
        'MCO' => array(
            'name' => 'Monaco',
            'country_code' => 377,
            'iso' => array(
                'alpha_2' => 'MC',
                'alpha_3' => 'MCO',
                'numeric' => 492,
                '3166_2' => 'ISO 3166_2:MC',
            ),
            'provinces' => array(
                'Fontvieille', 'La Condamine', 'Monaco-Ville', 'Monte-Carlo',
            ),
        ),
        'MNG' => array(
            'name' => 'Mongolia',
            'country_code' => 976,
            'iso' => array(
                'alpha_2' => 'MN',
                'alpha_3' => 'MNG',
                'numeric' => 496,
                '3166_2' => 'ISO 3166_2:MN',
            ),
            'provinces' => array(
                'Arhangay', 'Bayan-Olgiy', 'Bayanhongor', 'Bulgan', 'Darhan', 'Dornod', 'Dornogovi', 'Dundgovi', 'Dzavhan', 'Erdenet', 'Govi-Altay', 'Hentiy', 'Hovd', 'Hovsgol', 'Omnogovi', 'Ovorhangay', 'Selenge', 'Suhbaatar', 'Tov', 'Ulaanbaatar', 'Uvs',
            ),
        ),
        'MNE' => array(
            'name' => 'Montenegro',
            'country_code' => 382,
            'iso' => array(
                'alpha_2' => 'ME',
                'alpha_3' => 'MNE',
                'numeric' => 499,
                '3166_2' => 'ISO 3166_2:ME',
            ),
            'provinces' => array(
                'Montenegro'
            ),
        ),
        'MSR' => array(
            'name' => 'Montserrat',
            'country_code' => '1 664',
            'iso' => array(
                'alpha_2' => 'MS',
                'alpha_3' => 'MSR',
                'numeric' => 500,
                '3166_2' => 'ISO 3166_2:MS',
            ),
            'provinces' => array(
                'Saint Anthony', 'Saint Georges', 'Saint Peter&#8217;s'
            ),
        ),
        'MAR' => array(
            'name' => 'Morocco',
            'country_code' => 212,
            'iso' => array(
                'alpha_2' => 'MA',
                'alpha_3' => 'MAR',
                'numeric' => 504,
                '3166_2' => 'ISO 3166_2:MA',
            ),
            'provinces' => array(
                'Agadir', 'Al Hoceima', 'Azilal', 'Ben Slimane', 'Beni Mellal', 'Boulemane', 'Casablanca', 'Chaouen', 'El Jadida', 'El Kelaa des Srarhna', 'Er Rachidia', 'Essaouira', 'Fes', 'Figuig', 'Guelmim', 'Ifrane', 'Kenitra', 'Khemisset', 'Khenifra', 'Khouribga', 'Laayoune', 'Larache', 'Marrakech', 'Meknes', 'Nador', 'Ouarzazate', 'Oujda', 'Rabat-Sale', 'Safi', 'Settat', 'Sidi Kacem', 'Tan-Tan', 'Tanger', 'Taounate', 'Taroudannt', 'Tata', 'Taza', 'Tetouan', 'Tiznit',
            ),
        ),
        'MOZ' => array(
            'name' => 'Mozambique',
            'country_code' => 258,
            'iso' => array(
                'alpha_2' => 'MZ',
                'alpha_3' => 'MOZ',
                'numeric' => 508,
                '3166_2' => 'ISO 3166_2:MZ',
            ),
            'provinces' => array(
                'Cabo Delgado', 'Gaza', 'Inhambane', 'Manica', 'Maputo', 'Nampula', 'Niassa', 'Sofala', 'Tete', 'Zambezia',
            ),
        ),
        'MMR' => array(
            'name' => 'Myanmar',
            'country_code' => 95,
            'iso' => array(
                'alpha_2' => 'MM',
                'alpha_3' => 'MMR',
                'numeric' => 104,
                '3166_2' => 'ISO 3166_2:MM',
            ),
            'provinces' => array(
                'Ayeyarwady', 'Bago', 'Chin State', 'Kachin State', 'Kayah State', 'Kayin State', 'Magway', 'Mandalay', 'Mon State', 'Rakhine State', 'Sagaing', 'Shan State', 'Tanintharyi', 'Yangon',
            ),
        ),
        'NAM' => array(
            'name' => 'Namibia',
            'country_code' => 264,
            'iso' => array(
                'alpha_2' => 'NA',
                'alpha_3' => 'NAM',
                'numeric' => 516,
                '3166_2' => 'ISO 3166_2:NA',
            ),
            'provinces' => array(
                'Caprivi', 'Erongo', 'Hardap', 'Karas', 'Khomas', 'Kunene', 'Ohangwena', 'Okavango', 'Omaheke', 'Omusati', 'Oshana', 'Oshikoto', 'Otjozondjupa',
            ),
        ),
        'NRU' => array(
            'name' => 'Nauru',
            'country_code' => 674,
            'iso' => array(
                'alpha_2' => 'NR',
                'alpha_3' => 'NRU',
                'numeric' => 520,
                '3166_2' => 'ISO 3166_2:NR',
            ),
            'provinces' => array(
                'Aiwo', 'Anabar', 'Anetan', 'Anibare', 'Baiti', 'Boe', 'Buada', 'Denigomodu', 'Ewa', 'Ijuw', 'Meneng', 'Nibok', 'Uaboe', 'Yaren',
            ),
        ),
        'NPL' => array(
            'name' => 'Nepal',
            'country_code' => 977,
            'iso' => array(
                'alpha_2' => 'NP',
                'alpha_3' => 'NPL',
                'numeric' => 524,
                '3166_2' => 'ISO 3166_2:NP',
            ),
            'provinces' => array(
                'Bagmati', 'Bheri', 'Dhawalagiri', 'Gandaki', 'Janakpur', 'Karnali', 'Kosi', 'Lumbini', 'Mahakali', 'Mechi', 'Narayani', 'Rapti', 'Sagarmatha', 'Seti',
            ),
        ),
        'NLD' => array(
            'name' => 'Netherlands',
            'country_code' => 31,
            'iso' => array(
                'alpha_2' => 'NL',
                'alpha_3' => 'NLD',
                'numeric' => 528,
                '3166_2' => 'ISO 3166_2:NL',
            ),
            'provinces' => array(
                'Drenthe', 'Flevoland', 'Friesland', 'Gelderland', 'Groningen', 'Limburg', 'Noord-Brabant', 'Noord-Holland', 'Overijssel', 'Utrecht', 'Zeeland', 'Zuid-Holland',
            ),
        ),
        'NCL' => array(
            'name' => 'New Caledonia',
            'country_code' => 687,
            'iso' => array(
                'alpha_2' => 'NC',
                'alpha_3' => 'NCL',
                'numeric' => 540,
                '3166_2' => 'ISO 3166_2:NC',
            ),
            'provinces' => array(
                'Iles Loyaute', 'Nord', 'Sud',
            ),
        ),
        'NZL' => array(
            'name' => 'New Zealand',
            'country_code' => 64,
            'iso' => array(
                'alpha_2' => 'NZ',
                'alpha_3' => 'NZL',
                'numeric' => 554,
                '3166_2' => 'ISO 3166_2:NZ',
            ),
            'provinces' => array(
                'Akaroa', 'Amuri', 'Ashburton', 'Bay of Islands', 'Bruce', 'Buller', 'Chatham Islands', 'Cheviot', 'Clifton', 'Clutha', 'Cook', 'Dannevirke', 'Egmont', 'Eketahuna', 'Ellesmere', 'Eltham', 'Eyre', 'Featherston', 'Franklin', 'Golden Bay', 'Great Barrier Island', 'Grey', 'Hauraki Plains', 'Hawera', 'Hawke&#8217;s Bay', 'Heathcote', 'Hikurangi', 'Hobson', 'Hokianga', 'Horowhenua', 'Hurunui', 'Hutt', 'Inangahua', 'Inglewood', 'Kaikoura', 'Kairanga', 'Kiwitea', 'Lake', 'Mackenzie', 'Malvern', 'Manaia', 'Manawatu', 'Mangonui', 'Maniototo', 'Marlborough', 'Masterton', 'Matamata', 'Mount Herbert', 'Ohinemuri', 'Opotiki', 'Oroua', 'Otamatea', 'Otorohanga', 'Oxford', 'Pahiatua', 'Paparua', 'Patea', 'Piako', 'Pohangina', 'Raglan', 'Rangiora', 'Rangitikei', 'Rodney', 'Rotorua', 'Runanga', 'Saint Kilda', 'Silverpeaks', 'Southland', 'Stewart Island', 'Stratford', 'Strathallan', 'Taranaki', 'Taumarunui', 'Taupo', 'Tauranga', 'Thames-Coromandel', 'Tuapeka', 'Vincent', 'Waiapu', 'Waiheke', 'Waihemo', 'Waikato', 'Waikohu', 'Waimairi', 'Waimarino', 'Waimate', 'Waimate West', 'Waimea', 'Waipa', 'Waipawa', 'Waipukurau', 'Wairarapa South', 'Wairewa', 'Wairoa', 'Waitaki', 'Waitomo', 'Waitotara', 'Wallace', 'Wanganui', 'Waverley', 'Westland', 'Whakatane', 'Whangarei', 'Whangaroa', 'Woodville'
            ),
        ),
        'NIC' => array(
            'name' => 'Nicaragua',
            'country_code' => 505,
            'iso' => array(
                'alpha_2' => 'NI',
                'alpha_3' => 'NIC',
                'numeric' => 558,
                '3166_2' => 'ISO 3166_2:NI',
            ),
            'provinces' => array(
                'Atlantico Norte', 'Atlantico Sur', 'Boaco', 'Carazo', 'Chinandega', 'Chontales', 'Esteli', 'Granada', 'Jinotega', 'Leon', 'Madriz', 'Managua', 'Masaya', 'Matagalpa', 'Nueva Segovia', 'Rio San Juan', 'Rivas',
            ),
        ),
        'NER' => array(
            'name' => 'Niger',
            'country_code' => 227,
            'iso' => array(
                'alpha_2' => 'NE',
                'alpha_3' => 'NER',
                'numeric' => 562,
                '3166_2' => 'ISO 3166_2:NE',
            ),
            'provinces' => array(
                'Agadez', 'Diffa', 'Dosso', 'Maradi', 'Niamey', 'Tahoua', 'Tillaberi', 'Zinder',
            ),
        ),
        'NGA' => array(
            'name' => 'Nigeria',
            'country_code' => 234,
            'iso' => array(
                'alpha_2' => 'NG',
                'alpha_3' => 'NGA',
                'numeric' => 566,
                '3166_2' => 'ISO 3166_2:NG',
            ),
            'provinces' => array(
                'Abia', 'Abuja Federal Capital Territory', 'Adamawa', 'Akwa Ibom', 'Anambra', 'Bauchi', 'Bayelsa', 'Benue', 'Borno', 'Cross River', 'Delta', 'Ebonyi', 'Edo', 'Ekiti', 'Enugu', 'Gombe', 'Imo', 'Jigawa', 'Kaduna', 'Kano', 'Katsina', 'Kebbi', 'Kogi', 'Kwara', 'Lagos', 'Nassarawa', 'Niger', 'Ogun', 'Ondo', 'Osun', 'Oyo', 'Plateau', 'Rivers', 'Sokoto', 'Taraba', 'Yobe', 'Zamfara',
            ),
        ),
        'NIU' => array(
            'name' => 'Niue',
            'country_code' => 683,
            'iso' => array(
                'alpha_2' => 'NU',
                'alpha_3' => 'NIU',
                'numeric' => 570,
                '3166_2' => 'ISO 3166_2:NU',
            ),
            'provinces' => array(
                'Niue',
            ),
        ),
        'NFK' => array(
            'name' => 'Norfolk Island',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'NF',
                'alpha_3' => 'NFK',
                'numeric' => 574,
                '3166_2' => 'ISO 3166_2:NF',
            ),
            'provinces' => array(
                'Norfolk Island'
            ),
        ),
        'MNP' => array(
            'name' => 'Northern Mariana Islands',
            'country_code' => '1 670',
            'iso' => array(
                'alpha_2' => 'MP',
                'alpha_3' => 'MNP',
                'numeric' => 580,
                '3166_2' => 'ISO 3166_2:MP',
            ),
            'provinces' => array(
                'Northern Islands', 'Rota', 'Saipan', 'Tinian',
            ),
        ),
        'NOR' => array(
            'name' => 'Norway',
            'country_code' => 47,
            'iso' => array(
                'alpha_2' => 'NO',
                'alpha_3' => 'NOR',
                'numeric' => 578,
                '3166_2' => 'ISO 3166_2:NO',
            ),
            'provinces' => array(
                'Akershus', 'Aust-Agder', 'Buskerud', 'Finnmark', 'Hedmark', 'Hordaland', 'More og Romsdal', 'Nord-Trondelag', 'Nordland', 'Oppland', 'Oslo', 'Ostfold', 'Rogaland', 'Sogn og Fjordane', 'Sor-Trondelag', 'Telemark', 'Troms', 'Vest-Agder', 'Vestfold',
            ),
        ),
        'OMN' => array(
            'name' => 'Oman',
            'country_code' => 968,
            'iso' => array(
                'alpha_2' => 'OM',
                'alpha_3' => 'OMN',
                'numeric' => 512,
                '3166_2' => 'ISO 3166_2:OM',
            ),
            'provinces' => array(
                'Ad Dakhiliyah', 'Al Batinah', 'Al Wusta', 'Ash Sharqiyah', 'Az Zahirah', 'Masqat', 'Musandam', 'Zufar',
            ),
        ),
        'PAK' => array(
            'name' => 'Pakistan',
            'country_code' => 92,
            'iso' => array(
                'alpha_2' => 'PK',
                'alpha_3' => 'PAK',
                'numeric' => 586,
                '3166_2' => 'ISO 3166_2:PK',
            ),
            'provinces' => array(
                'Balochistan', 'Federally Administered Tribal Areas', 'Islamabad Capital Territory', 'North-West Frontier Province', 'Punjab', 'Sindh',
            ),
        ),
        'PLW' => array(
            'name' => 'Palau',
            'country_code' => 680,
            'iso' => array(
                'alpha_2' => 'PW',
                'alpha_3' => 'PLW',
                'numeric' => 585,
                '3166_2' => 'ISO 3166_2:PW',
            ),
            'provinces' => array(
                'Aimeliik', 'Airai', 'Angaur', 'Hatobohei', 'Kayangel', 'Koror', 'Melekeok', 'Ngaraard', 'Ngarchelong', 'Ngardmau', 'Ngatpang', 'Ngchesar', 'Ngeremlengui', 'Ngiwal', 'Palau Island', 'Peleliu', 'Sonsoral', 'Tobi',
            ),
        ),
        'PSE' => array(
            'name' => 'Palestinian Territory Occupied',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'PS',
                'alpha_3' => 'PSE',
                'numeric' => 275,
                '3166_2' => 'ISO 3166_2:PS',
            ),
            'provinces' => array(
                'West Bank', 'Gaza Strip',
            ),
        ),
        'PAN' => array(
            'name' => 'Panama',
            'country_code' => 507,
            'iso' => array(
                'alpha_2' => 'PA',
                'alpha_3' => 'PAN',
                'numeric' => 591,
                '3166_2' => 'ISO 3166_2:PA',
            ),
            'provinces' => array(
                'Bocas del Toro', 'Chiriqui', 'Cocle', 'Colon', 'Darien', 'Herrera', 'Los Santos', 'Panama', 'San Blas', 'Veraguas',
            ),
        ),
        'PNG' => array(
            'name' => 'Papua New Guinea',
            'country_code' => 675,
            'iso' => array(
                'alpha_2' => 'PG',
                'alpha_3' => 'PNG',
                'numeric' => 598,
                '3166_2' => 'ISO 3166_2:PG',
            ),
            'provinces' => array(
                'Bougainville', 'Central', 'Chimbu', 'East New Britain', 'East Sepik', 'Eastern Highlands', 'Enga', 'Gulf', 'Madang', 'Manus', 'Milne Bay', 'Morobe', 'National Capital', 'New Ireland', 'Northern', 'Sandaun', 'Southern Highlands', 'West New Britain', 'Western', 'Western Highlands',
            ),
        ),
        'PRY' => array(
            'name' => 'Paraguay',
            'country_code' => 595,
            'iso' => array(
                'alpha_2' => 'PY',
                'alpha_3' => 'PRY',
                'numeric' => 600,
                '3166_2' => 'ISO 3166_2:PY',
            ),
            'provinces' => array(
                'Alto Paraguay', 'Alto Parana', 'Amambay', 'Asuncion (city)', 'Boqueron', 'Caaguazu', 'Caazapa', 'Canindeyu', 'Central', 'Concepcion', 'Cordillera', 'Guaira', 'Itapua', 'Misiones', 'Neembucu', 'Paraguari', 'Presidente Hayes', 'San Pedro',
            ),
        ),
        'PER' => array(
            'name' => 'Peru',
            'country_code' => 51,
            'iso' => array(
                'alpha_2' => 'PE',
                'alpha_3' => 'PER',
                'numeric' => 604,
                '3166_2' => 'ISO 3166_2:PE',
            ),
            'provinces' => array(
                'Amazonas', 'Ancash', 'Apurimac', 'Arequipa', 'Ayacucho', 'Cajamarca', 'Callao', 'Cusco', 'Huancavelica', 'Huanuco', 'Ica', 'Junin', 'La Libertad', 'Lambayeque', 'Lima', 'Loreto', 'Madre de Dios', 'Moquegua', 'Pasco', 'Piura', 'Puno', 'San Martin', 'Tacna', 'Tumbes', 'Ucayali',
            ),
        ),
        'PHL' => array(
            'name' => 'Philippines',
            'country_code' => 63,
            'iso' => array(
                'alpha_2' => 'PH',
                'alpha_3' => 'PHL',
                'numeric' => 608,
                '3166_2' => 'ISO 3166_2:PH',
            ),
            'provinces' => array(
                'Abra', 'Agusan del Norte', 'Agusan del Sur', 'Aklan', 'Albay', 'Angeles', 'Antique', 'Aurora', 'Bacolod', 'Bago', 'Baguio', 'Bais', 'Basilan', 'Basilan City', 'Bataan', 'Batanes', 'Batangas', 'Batangas City', 'Benguet', 'Bohol', 'Bukidnon', 'Bulacan', 'Butuan', 'Cabanatuan', 'Cadiz', 'Cagayan', 'Cagayan de Oro', 'Calbayog', 'Caloocan', 'Camarines Norte', 'Camarines Sur', 'Camiguin', 'Canlaon', 'Capiz', 'Catanduanes', 'Cavite', 'Cavite City', 'Cebu', 'Cebu City', 'Cotabato', 'Dagupan', 'Danao', 'Dapitan', 'Davao City Davao', 'Davao del Sur', 'Davao Oriental', 'Dipolog', 'Dumaguete', 'Eastern Samar', 'General Santos', 'Gingoog', 'Ifugao', 'Iligan', 'Ilocos Norte', 'Ilocos Sur', 'Iloilo', 'Iloilo City', 'Iriga', 'Isabela', 'Kalinga-Apayao', 'La Carlota', 'La Union', 'Laguna', 'Lanao del Norte', 'Lanao del Sur', 'Laoag', 'Lapu-Lapu', 'Legaspi', 'Leyte', 'Lipa', 'Lucena', 'Maguindanao', 'Mandaue', 'Manila', 'Marawi', 'Marinduque', 'Masbate', 'Mindoro Occidental', 'Mindoro Oriental', 'Misamis Occidental', 'Misamis Oriental', 'Mountain', 'Naga', 'Negros Occidental', 'Negros Oriental', 'North Cotabato', 'Northern Samar', 'Nueva Ecija', 'Nueva Vizcaya', 'Olongapo', 'Ormoc', 'Oroquieta', 'Ozamis', 'Pagadian', 'Palawan', 'Palayan', 'Pampanga', 'Pangasinan', 'Pasay', 'Puerto Princesa', 'Quezon', 'Quezon City', 'Quirino', 'Rizal', 'Romblon', 'Roxas', 'Samar', 'San Carlos (in Negros Occidental)', 'San Carlos (in Pangasinan)', 'San Jose', 'San Pablo', 'Silay', 'Siquijor', 'Sorsogon', 'South Cotabato', 'Southern Leyte', 'Sultan Kudarat', 'Sulu', 'Surigao', 'Surigao del Norte', 'Surigao del Sur', 'Tacloban', 'Tagaytay', 'Tagbilaran', 'Tangub', 'Tarlac', 'Tawitawi', 'Toledo', 'Trece Martires', 'Zambales', 'Zamboanga', 'Zamboanga del Norte', 'Zamboanga del Sur',
            ),
        ),
        'PCN' => array(
            'name' => 'Pitcairn',
            'country_code' => 870,
            'iso' => array(
                'alpha_2' => 'PN',
                'alpha_3' => 'PCN',
                'numeric' => 612,
                '3166_2' => 'ISO 3166_2:PN',
            ),
            'provinces' => array(
                'Pitcarin Islands'
            ),
        ),
        'POL' => array(
            'name' => 'Poland',
            'country_code' => 48,
            'iso' => array(
                'alpha_2' => 'PL',
                'alpha_3' => 'POL',
                'numeric' => 616,
                '3166_2' => 'ISO 3166_2:PL',
            ),
            'provinces' => array(
                'Dolnoslaskie', 'Kujawsko-Pomorskie', 'Lodzkie', 'Lubelskie', 'Lubuskie', 'Malopolskie', 'Mazowieckie', 'Opolskie', 'Podkarpackie', 'Podlaskie', 'Pomorskie', 'Slaskie', 'Swietokrzyskie', 'Warminsko-Mazurskie', 'Wielkopolskie', 'Zachodniopomorskie',
            ),
        ),
        'PRT' => array(
            'name' => 'Portugal',
            'country_code' => 351,
            'iso' => array(
                'alpha_2' => 'PT',
                'alpha_3' => 'PRT',
                'numeric' => 620,
                '3166_2' => 'ISO 3166_2:PT',
            ),
            'provinces' => array(
                'Acores (Azores)', 'Aveiro', 'Beja', 'Braga', 'Braganca', 'Castelo Branco', 'Coimbra', 'Evora', 'Faro', 'Guarda', 'Leiria', 'Lisboa', 'Madeira', 'Portalegre', 'Porto', 'Santarem', 'Setubal', 'Viana do Castelo', 'Vila Real', 'Viseu',
            ),
        ),
        'PRI' => array(
            'name' => 'Puerto Rico',
            'country_code' => 1,
            'iso' => array(
                'alpha_2' => 'PR',
                'alpha_3' => 'PRI',
                'numeric' => 630,
                '3166_2' => 'ISO 3166_2:PR',
            ),
            'provinces' => array(
                'Adjuntas', 'Aguada', 'Aguadilla', 'Aguas Buenas', 'Aibonito', 'Anasco', 'Arecibo', 'Arroyo', 'Barceloneta', 'Barranquitas', 'Bayamon', 'Cabo Rojo', 'Caguas', 'Camuy', 'Canovanas', 'Carolina', 'Catano', 'Cayey', 'Ceiba', 'Ciales', 'Cidra', 'Coamo', 'Comerio', 'Corozal', 'Culebra', 'Dorado', 'Fajardo', 'Florida', 'Guanica', 'Guayama', 'Guayanilla', 'Guaynabo', 'Gurabo', 'Hatillo', 'Hormigueros', 'Humacao', 'Isabela', 'Jayuya', 'Juana Diaz', 'Juncos', 'Lajas', 'Lares', 'Las Marias', 'Las Piedras', 'Loiza', 'Luquillo', 'Manati', 'Maricao', 'Maunabo', 'Mayaguez', 'Moca', 'Morovis', 'Naguabo', 'Naranjito', 'Orocovis', 'Patillas', 'Penuelas', 'Ponce', 'Quebradillas', 'Rincon', 'Rio Grande', 'Sabana Grande', 'Salinas', 'San German', 'San Juan', 'San Lorenzo', 'San Sebastian', 'Santa Isabel', 'Toa Alta', 'Toa Baja', 'Trujillo Alto', 'Utuado', 'Vega Alta', 'Vega Baja', 'Vieques', 'Villalba', 'Yabucoa', 'Yauco',
            ),
        ),
        'QAT' => array(
            'name' => 'Qatar',
            'country_code' => 974,
            'iso' => array(
                'alpha_2' => 'QA',
                'alpha_3' => 'QAT',
                'numeric' => 634,
                '3166_2' => 'ISO 3166_2:QA',
            ),
            'provinces' => array(
                'Ad Dawhah', 'Al Ghuwayriyah', 'Al Jumayliyah', 'Al Khawr', 'Al Wakrah', 'Ar Rayyan', 'Jarayan al Batinah', 'Madinat ash Shamal', 'Umm Salal',
            ),
        ),
        'REU' => array(
            'name' => 'Reunion',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'RE',
                'alpha_3' => 'REU',
                'numeric' => 638,
                '3166_2' => 'ISO 3166_2:RE',
            ),
            'provinces' => array(
                'Reunion'
            ),
        ),
        'ROU' => array(
            'name' => 'Romania',
            'country_code' => 40,
            'iso' => array(
                'alpha_2' => 'RO',
                'alpha_3' => 'ROU',
                'numeric' => 642,
                '3166_2' => 'ISO 3166_2:RO',
            ),
            'provinces' => array(
                'Alba', 'Arad', 'Arges', 'Bacau', 'Bihor', 'Bistrita-Nasaud', 'Botosani', 'Braila', 'Brasov', 'Bucuresti', 'Buzau', 'Calarasi', 'Caras-Severin', 'Cluj', 'Constanta', 'Covasna', 'Dimbovita', 'Dolj', 'Galati', 'Giurgiu', 'Gorj', 'Harghita', 'Hunedoara', 'Ialomita', 'Iasi', 'Maramures', 'Mehedinti', 'Mures', 'Neamt', 'Olt', 'Prahova', 'Salaj', 'Satu Mare', 'Sibiu', 'Suceava', 'Teleorman', 'Timis', 'Tulcea', 'Vaslui', 'Vilcea', 'Vrancea',
            ),
        ),
        'RUS' => array(
            'name' => 'Russian Federation',
            'country_code' => 7,
            'iso' => array(
                'alpha_2' => 'RU',
                'alpha_3' => 'RUS',
                'numeric' => 643,
                '3166_2' => 'ISO 3166_2:RU',
            ),
            'provinces' => array(
                'Adygeja, Respublika', 'Altaj, Respublika', 'Baškortostan, Respublika', 'Burjatija, Respublika', 'Čečenskaja Respublika', 'Čuvašskaja Respublika', 'Dagestan, Respublika', 'Ingušetija, Respublika', 'Kabardino-Balkarskaja Respublika', 'Kalmykija, Respublika', 'Karačajevo-Čerkesskaja Respublika', 'Karelija, Respublika', 'Hakasija, Respublika', 'Komi, Respublika', 'Marij Èl, Respublika', 'Mordovija, Respublika', 'Saha, Respublika (Jakutija)', 'Severnaja Osetija-Alanija, Respublika', 'Tatarstan, Respublika', 'Tyva, Respublika (Tuva)', 'Udmurtskaja Respublika',
                'Altajskij kraj', 'Kamčatskij kraj', 'Habarovskij kraj', 'Krasnodarskij kraj', 'Krasnojarskij kraj', 'Permskij kraj', 'Primorskij kraj', 'Stavropol&#8217;skij kraj', 'Zabajkal&#8217;skij kraj',
                'Amurskaja oblast&#8217;', 'Arhangel&#8217;skaja oblast&#8217;', 'Astrahanskaja oblast&#8217;', 'Belgorodskaja oblast&#8217;', 'Brjanskaja oblast&#8217;', 'Čeljabinskaja oblast&#8217;',
                'Irkutskaja oblast&#8217;', 'Ivanovskaja oblast&#8217;', 'Kaliningradskaja oblast&#8217;', 'Kalužskaja oblast&#8217;', 'Kemerovskaja oblast&#8217;', 'Kirovskaja oblast&#8217;', 'Kostromskaja oblast&#8217;', 'Kurganskaja oblast&#8217;', 'Kurskaja oblast&#8217;',
                'Leningradskaja oblast&#8217;', 'Lipetskaja oblast&#8217;', 'Magadanskaja oblast&#8217;', 'Moskovskaja oblast&#8217;', 'Murmanskaja oblast&#8217;', 'Nižegorodskaja oblast&#8217;', 'Novgorodskaja oblast&#8217;', 'Novosibirskaja oblast&#8217;',
                'Omskaja oblast&#8217;', 'Orenburgskaja oblast&#8217;', 'Orlovskaja oblast&#8217;', 'Penzenskaja oblast&#8217;', 'Pskovskaja oblast&#8217;', 'Rostovskaja oblast&#8217;', 'Rjazanskaja oblast&#8217;', 'Sahalinskaja oblast&#8217;', 'Samarskaja oblast&#8217;',
                'Saratovskaja oblast&#8217;', 'Smolenskaja oblast&#8217;', 'Sverdlovskaja oblast&#8217;', 'Tambovskaja oblast&#8217;', 'Tomskaja oblast&#8217;', 'Tul&#8217;skaja oblast&#8217;', 'Tverskaja oblast&#8217;', 'Tjumenskaja oblast&#8217;', 'Ul&#8217;janovskaja oblast&#8217;',
                'Vladimirskaja oblast&#8217;', 'Volgogradskaja oblast&#8217;', 'Vologodskaja oblast&#8217;', 'Voronežskaja oblast&#8217;', 'Jaroslavskaja oblast&#8217;',
                'Moskva', 'Sankt-Peterburg', 'Evrejskaja avtonomnaja oblast&#8217;', 'Čukotskij avtonomnyj okrug', 'Hanty-Mansijskij avtonomnyj okrug-Jugra', 'Nenetskij avtonomnyj okrug', 'Jamalo-Nenetskij avtonomnyj okrug'
            ),
        ),
        'RWA' => array(
            'name' => 'Rwanda',
            'country_code' => 250,
            'iso' => array(
                'alpha_2' => 'RW',
                'alpha_3' => 'RWA',
                'numeric' => 646,
                '3166_2' => 'ISO 3166_2:RW',
            ),
            'provinces' => array(
                'Butare', 'Byumba', 'Cyangugu', 'Gikongoro', 'Gisenyi', 'Gitarama', 'Kibungo', 'Kibuye', 'Kigali Rurale', 'Kigali-ville', 'Ruhengeri', 'Umutara',
            ),
        ),
        'BLM' => array(
            'name' => 'Saint Barthelemy',
            'country_code' => 590,
            'iso' => array(
                'alpha_2' => 'BL',
                'alpha_3' => 'BLM',
                'numeric' => 652,
                '3166_2' => 'ISO 3166_2:BL',
            ),
            'provinces' => array(
                'Saint Barthelemy'
            ),
        ),
        'SHN' => array(
            'name' => 'Saint Helena Ascension and Tristan da Cunha',
            'country_code' => 290,
            'iso' => array(
                'alpha_2' => 'SH',
                'alpha_3' => 'SHN',
                'numeric' => 654,
                '3166_2' => 'ISO 3166_2:SH',
            ),
            'provinces' => array(
                'Ascension', 'Saint Helena', 'Tristan da Cunha',
            ),
        ),
        'KNA' => array(
            'name' => 'Saint Kitts and Nevis',
            'country_code' => '1 869',
            'iso' => array(
                'alpha_2' => 'KN',
                'alpha_3' => 'KNA',
                'numeric' => 659,
                '3166_2' => 'ISO 3166_2:KN',
            ),
            'provinces' => array(
                'Christ Church Nichola Town', 'Saint Anne Sandy Point', 'Saint George Basseterre', 'Saint George Gingerland', 'Saint James Windward', 'Saint John Capisterre', 'Saint John Figtree', 'Saint Mary Cayon', 'Saint Paul Capisterre', 'Saint Paul Charlestown', 'Saint Peter Basseterre', 'Saint Thomas Lowland', 'Saint Thomas Middle Island', 'Trinity Palmetto Point',
            ),
        ),
        'LCA' => array(
            'name' => 'Saint Lucia',
            'country_code' => '1 758',
            'iso' => array(
                'alpha_2' => 'LC',
                'alpha_3' => 'LCA',
                'numeric' => 662,
                '3166_2' => 'ISO 3166_2:LC',
            ),
            'provinces' => array(
                'Anse-la-Raye', 'Castries', 'Choiseul', 'Dauphin', 'Dennery', 'Gros Islet', 'Laborie', 'Micoud', 'Praslin', 'Soufriere', 'Vieux Fort',
            ),
        ),
        'MAF' => array(
            'name' => 'Saint Martin (French part)',
            'country_code' => '1 599',
            'iso' => array(
                'alpha_2' => 'MF',
                'alpha_3' => 'MAF',
                'numeric' => 663,
                '3166_2' => 'ISO 3166_2:MF',
            ),
            'provinces' => array(
                'Saint Martin (French part)',
            ),
        ),
        'SPM' => array(
            'name' => 'Saint Pierre and Miquelon',
            'country_code' => 508,
            'iso' => array(
                'alpha_2' => 'PM',
                'alpha_3' => 'SPM',
                'numeric' => 666,
                '3166_2' => 'ISO 3166_2:PM',
            ),
            'provinces' => array(
                'Miquelon', 'Saint Pierre',
            ),
        ),
        'VCT' => array(
            'name' => 'Saint Vincent and the Grenadines',
            'country_code' => '1 784',
            'iso' => array(
                'alpha_2' => 'VC',
                'alpha_3' => 'VCT',
                'numeric' => 670,
                '3166_2' => 'ISO 3166_2:VC',
            ),
            'provinces' => array(
                'Charlotte', 'Grenadines', 'Saint Andrew', 'Saint David', 'Saint George', 'Saint Patrick',
            ),
        ),
        'WSM' => array(
            'name' => 'Samoa',
            'country_code' => 685,
            'iso' => array(
                'alpha_2' => 'WS',
                'alpha_3' => 'WSM',
                'numeric' => 882,
                '3166_2' => 'ISO 3166_2:WS',
            ),
            'provinces' => array(
                'A&#8217;ana', 'Aiga-i-le-Tai', 'Atua', 'Fa&#8217;asaleleaga', 'Gaga&#8217;emauga', 'Gagaifomauga', 'Palauli', 'Satupa&#8217;itea', 'Tuamasaga', 'Va&#8217;a-o-Fonoti', 'Vaisigano'
            ),
        ),
        'SMR' => array(
            'name' => 'San Marino',
            'country_code' => 378,
            'iso' => array(
                'alpha_2' => 'SM',
                'alpha_3' => 'SMR',
                'numeric' => 674,
                '3166_2' => 'ISO 3166_2:SM',
            ),
            'provinces' => array(
                'Acquaviva', 'Borgo Maggiore', 'Chiesanuova', 'Domagnano', 'Faetano', 'Fiorentino', 'Monte Giardino', 'San Marino', 'Serravalle',
            ),
        ),
        'STP' => array(
            'name' => 'Sao Tome and Principe',
            'country_code' => 239,
            'iso' => array(
                'alpha_2' => 'ST',
                'alpha_3' => 'STP',
                'numeric' => 678,
                '3166_2' => 'ISO 3166_2:ST',
            ),
            'provinces' => array(
                'Principe', 'Sao Tome',
            ),
        ),
        'SAU' => array(
            'name' => 'Saudi Arabia',
            'country_code' => 966,
            'iso' => array(
                'alpha_2' => 'SA',
                'alpha_3' => 'SAU',
                'numeric' => 682,
                '3166_2' => 'ISO 3166_2:SA',
            ),
            'provinces' => array(
                '&#8217;Asir', 'Al Bahah', 'Al Hudud ash Shamaliyah', 'Al Jawf', 'Al Madinah', 'Al Qasim', 'Ar Riyad', 'Ash Sharqiyah (Eastern Province)', 'Ha&#8217;il', 'Jizan', 'Makkah', 'Najran', 'Tabuk',
            ),
        ),
        'SEN' => array(
            'name' => 'Senegal',
            'country_code' => 221,
            'iso' => array(
                'alpha_2' => 'SN',
                'alpha_3' => 'SEN',
                'numeric' => 686,
                '3166_2' => 'ISO 3166_2:SN',
            ),
            'provinces' => array(
                'Dakar', 'Diourbel', 'Fatick', 'Kaolack', 'Kolda', 'Louga', 'Saint-Louis', 'Tambacounda', 'Thies', 'Ziguinchor',
            ),
        ),
        'SRB' => array(
            'name' => 'Serbia',
            'country_code' => 381,
            'iso' => array(
                'alpha_2' => 'RS',
                'alpha_3' => 'SRB',
                'numeric' => 688,
                '3166_2' => 'ISO 3166_2:RS',
            ),
            'provinces' => array(
                'Serbia'
            ),
        ),
        'SYC' => array(
            'name' => 'Seychelles',
            'country_code' => 248,
            'iso' => array(
                'alpha_2' => 'SC',
                'alpha_3' => 'SYC',
                'numeric' => 690,
                '3166_2' => 'ISO 3166_2:SC',
            ),
            'provinces' => array(
                'Anse aux Pins', 'Anse Boileau', 'Anse Etoile', 'Anse Louis', 'Anse Royale', 'Baie Lazare', 'Baie Sainte Anne', 'Beau Vallon', 'Bel Air', 'Bel Ombre', 'Cascade', 'Glacis', 'Grand&#8217; Anse (on Mahe)', 'Grand&#8217; Anse (on Praslin)', 'La Digue', 'La Riviere Anglaise', 'Mont Buxton', 'Mont Fleuri', 'Plaisance', 'Pointe La Rue', 'Port Glaud', 'Saint Louis', 'Takamaka'
            ),
        ),
        'SLE' => array(
            'name' => 'Sierra Leone',
            'country_code' => 232,
            'iso' => array(
                'alpha_2' => 'SL',
                'alpha_3' => 'SLE',
                'numeric' => 694,
                '3166_2' => 'ISO 3166_2:SL',
            ),
            'provinces' => array(
                'Eastern', 'Northern', 'Southern', 'Western',
            ),
        ),
        'SGP' => array(
            'name' => 'Singapore',
            'country_code' => 65,
            'iso' => array(
                'alpha_2' => 'SG',
                'alpha_3' => 'SGP',
                'numeric' => 702,
                '3166_2' => 'ISO 3166_2:SG',
            ),
            'provinces' => array(
                'Singapore'
            ),
        ),
        'SXM' => array(
            'name' => 'Sint Maarten (Dutch part)',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'SX',
                'alpha_3' => 'SXM',
                'numeric' => 534,
                '3166_2' => 'ISO 3166_2:SX',
            ),
            'provinces' => array(
                'Sint Maarten (Dutch part)'
            ),
        ),
        'SVK' => array(
            'name' => 'Slovakia',
            'country_code' => 421,
            'iso' => array(
                'alpha_2' => 'SK',
                'alpha_3' => 'SVK',
                'numeric' => 703,
                '3166_2' => 'ISO 3166_2:SK',
            ),
            'provinces' => array(
                'Banskobystricky', 'Bratislavsky', 'Kosicky', 'Nitriansky', 'Presovsky', 'Trenciansky', 'Trnavsky', 'Zilinsky',
            ),
        ),
        'SVN' => array(
            'name' => 'Slovenia',
            'country_code' => 386,
            'iso' => array(
                'alpha_2' => 'SI',
                'alpha_3' => 'SVN',
                'numeric' => 705,
                '3166_2' => 'ISO 3166_2:SI',
            ),
            'provinces' => array(
                'Ajdovscina', 'Beltinci', 'Bled', 'Bohinj', 'Borovnica', 'Bovec', 'Brda', 'Brezice', 'Brezovica', 'Cankova-Tisina', 'Celje', 'Cerklje na Gorenjskem', 'Cerknica', 'Cerkno', 'Crensovci', 'Crna na Koroskem', 'Crnomelj', 'Destrnik-Trnovska Vas', 'Divaca', 'Dobrepolje', 'Dobrova-Horjul-Polhov Gradec', 'Dol pri Ljubljani', 'Domzale', 'Dornava', 'Dravograd', 'Duplek', 'Gorenja Vas-Poljane', 'Gorisnica', 'Gornja Radgona', 'Gornji Grad', 'Gornji Petrovci', 'Grosuplje', 'Hodos Salovci', 'Hrastnik', 'Hrpelje-Kozina', 'Idrija', 'Ig', 'Ilirska Bistrica', 'Ivancna Gorica', 'Izola', 'Jesenice', 'Jursinci', 'Kamnik', 'Kanal', 'Kidricevo', 'Kobarid', 'Kobilje', 'Kocevje', 'Komen', 'Koper', 'Kozje', 'Kranj', 'Kranjska Gora', 'Krsko', 'Kungota', 'Kuzma', 'Lasko', 'Lenart', 'Lendava', 'Litija', 'Ljubljana', 'Ljubno', 'Ljutomer', 'Logatec', 'Loska Dolina', 'Loski Potok', 'Luce', 'Lukovica', 'Majsperk', 'Maribor', 'Medvode', 'Menges', 'Metlika', 'Mezica', 'Miren-Kostanjevica', 'Mislinja', 'Moravce', 'Moravske Toplice', 'Mozirje', 'Murska Sobota', 'Muta', 'Naklo', 'Nazarje', 'Nova Gorica', 'Novo Mesto', 'Odranci', 'Ormoz', 'Osilnica', 'Pesnica', 'Piran', 'Pivka', 'Podcetrtek', 'Podvelka-Ribnica', 'Postojna', 'Preddvor', 'Ptuj', 'Puconci', 'Race-Fram', 'Radece', 'Radenci', 'Radlje ob Dravi', 'Radovljica', 'Ravne-Prevalje', 'Ribnica', 'Rogasevci', 'Rogaska Slatina', 'Rogatec', 'Ruse', 'Semic', 'Sencur', 'Sentilj', 'Sentjernej', 'Sentjur pri Celju', 'Sevnica', 'Sezana', 'Skocjan', 'Skofja Loka', 'Skofljica', 'Slovenj Gradec', 'Slovenska Bistrica', 'Slovenske Konjice', 'Smarje pri Jelsah', 'Smartno ob Paki', 'Sostanj', 'Starse', 'Store', 'Sveti Jurij', 'Tolmin', 'Trbovlje', 'Trebnje', 'Trzic', 'Turnisce', 'Velenje', 'Velike Lasce', 'Videm', 'Vipava', 'Vitanje', 'Vodice', 'Vojnik', 'Vrhnika', 'Vuzenica', 'Zagorje ob Savi', 'Zalec', 'Zavrc', 'Zelezniki', 'Ziri', 'Zrece',
            ),
        ),
        'SLB' => array(
            'name' => 'Solomon Islands',
            'country_code' => 677,
            'iso' => array(
                'alpha_2' => 'SB',
                'alpha_3' => 'SLB',
                'numeric' => 090,
                '3166_2' => 'ISO 3166_2:SB',
            ),
            'provinces' => array(
                'Bellona', 'Central', 'Choiseul (Lauru)', 'Guadalcanal', 'Honiara', 'Isabel', 'Makira', 'Malaita', 'Rennell', 'Temotu', 'Western',
            ),
        ),
        'SOM' => array(
            'name' => 'Somalia',
            'country_code' => 252,
            'iso' => array(
                'alpha_2' => 'SO',
                'alpha_3' => 'SOM',
                'numeric' => 706,
                '3166_2' => 'ISO 3166_2:SO',
            ),
            'provinces' => array(
                'Awdal', 'Bakool', 'Banaadir', 'Bari', 'Bay', 'Galguduud', 'Gedo', 'Hiiraan', 'Jubbada Dhexe', 'Jubbada Hoose', 'Mudug', 'Nugaal', 'Sanaag', 'Shabeellaha Dhexe', 'Shabeellaha Hoose', 'Sool', 'Togdheer', 'Woqooyi Galbeed',
            ),
        ),
        'ZAF' => array(
            'name' => 'South Africa',
            'country_code' => 27,
            'iso' => array(
                'alpha_2' => 'ZA',
                'alpha_3' => 'ZAF',
                'numeric' => 710,
                '3166_2' => 'ISO 3166_2:ZA',
            ),
            'provinces' => array(
                'Eastern Cape', 'Free State', 'Gauteng', 'KwaZulu-Natal', 'Limpopo', 'Mpumalanga', 'North West', 'Northern Cape', 'Western Cape',
            ),
        ),
        'SGS' => array(
            'name' => 'South Georgia and the South Sandwich Islands',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'GS',
                'alpha_3' => 'SGS',
                'numeric' => 239,
                '3166_2' => 'ISO 3166_2:GS',
            ),
            'provinces' => array(
                'Bird Island', 'Bristol Island', 'Clerke Rocks', 'Montagu Island', 'Saunders Island', 'South Georgia', 'Southern Thule', 'Traversay Islands',
            ),
        ),
        'SSD' => array(
            'name' => 'South Sudan',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'SS',
                'alpha_3' => 'SSD',
                'numeric' => 728,
                '3166_2' => 'ISO 3166_2:SS',
            ),
            'provinces' => array(
                'South Sudan'
            ),
        ),
        'ESP' => array(
            'name' => 'Spain',
            'country_code' => 34,
            'iso' => array(
                'alpha_2' => 'ES',
                'alpha_3' => 'ESP',
                'numeric' => 724,
                '3166_2' => 'ISO 3166_2:ES',
            ),
            'provinces' => array(
                'Albacete', 'Alicante', 'Almer\xeda', 'Asturias', 'Badajoz', 'Balearic Islands', 'Barcelona', 'Biscay', 'Burgos', 'Cantabria', 'Castell\xf3n', 'Ciudad Real', 'Cuenca', 'C\xe1ceres', 'C\xe1diz', 'C\xf3rdoba', 'Gerona', 'Granada', 'Guadalajara', 'Guip\xfazcoa', 'Huelva', 'Huesca', 'Ja\xe9n', 'La Coru\xf1a', 'La Rioja', 'Las Palmas', 'Le\xf3n', 'Lugo', 'L\xe9rida', 'Madrid', 'Murcia', 'M\xe1laga', 'Navarre', 'Orense', 'Palencia', 'Pontevedra', 'Salamanca', 'Santa Cruz', 'Segovia', 'Sevilla', 'Soria', 'Tarragona', 'Teruel', 'Toledo', 'Valencia', 'Valladolid', 'Zamora', 'Zaragoza', '\xc1lava', '\xc1vila',
            ),
        ),
        'LKA' => array(
            'name' => 'Sri Lanka',
            'country_code' => 94,
            'iso' => array(
                'alpha_2' => 'LK',
                'alpha_3' => 'LKA',
                'numeric' => 144,
                '3166_2' => 'ISO 3166_2:LK',
            ),
            'provinces' => array(
                'Central', 'Eastern', 'North Central', 'North Eastern', 'North Western', 'Northern', 'Sabaragamuwa', 'Southern', 'Uva', 'Western',
            ),
        ),
        'SDN' => array(
            'name' => 'Sudan',
            'country_code' => 249,
            'iso' => array(
                'alpha_2' => 'SD',
                'alpha_3' => 'SDN',
                'numeric' => 729,
                '3166_2' => 'ISO 3166_2:SD',
            ),
            'provinces' => array(
                'A&#8217;ali an Nil', 'Al Bahr al Ahmar', 'Al Buhayrat', 'Al Jazirah', 'Al Khartum', 'Al Qadarif', 'Al Wahdah', 'An Nil al Abyad', 'An Nil al Azraq', 'Ash Shamaliyah', 'Bahr al Jabal', 'Gharb al Istiwa&#8217;iyah', 'Gharb Bahr al Ghazal', 'Gharb Darfur', 'Gharb Kurdufan', 'Janub Darfur', 'Janub Kurdufan', 'Junqali', 'Kassala', 'Nahr an Nil', 'Shamal Bahr al Ghazal', 'Shamal Darfur', 'Shamal Kurdufan', 'Sharq al Istiwa&#8217;iyah', 'Sinnar', 'Warab'
            ),
        ),
        'SUR' => array(
            'name' => 'Suriname',
            'country_code' => 597,
            'iso' => array(
                'alpha_2' => 'SR',
                'alpha_3' => 'SUR',
                'numeric' => 740,
                '3166_2' => 'ISO 3166_2:SR',
            ),
            'provinces' => array(
                'Brokopondo', 'Commewijne', 'Coronie', 'Marowijne', 'Nickerie', 'Para', 'Paramaribo', 'Saramacca', 'Sipaliwini', 'Wanica',
            ),
        ),
        'SJM' => array(
            'name' => 'Svalbard and Jan Mayen',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'SJ',
                'alpha_3' => 'SJM',
                'numeric' => 744,
                '3166_2' => 'ISO 3166_2:SJ',
            ),
            'provinces' => array(
                'Barentsoya', 'Bjornoya', 'Edgeoya', 'Hopen', 'Kvitoya', 'Nordaustandet', 'Prins Karls Forland', 'Spitsbergen',
            ),
        ),
        'SWZ' => array(
            'name' => 'Swaziland',
            'country_code' => 268,
            'iso' => array(
                'alpha_2' => 'SZ',
                'alpha_3' => 'SWZ',
                'numeric' => 748,
                '3166_2' => 'ISO 3166_2:SZ',
            ),
            'provinces' => array(
                'Hhohho', 'Lubombo', 'Manzini', 'Shiselweni',
            ),
        ),
        'SWE' => array(
            'name' => 'Sweden',
            'country_code' => 46,
            'iso' => array(
                'alpha_2' => 'SE',
                'alpha_3' => 'SWE',
                'numeric' => 752,
                '3166_2' => 'ISO 3166_2:SE',
            ),
            'provinces' => array(
                'Blekinge', 'Dalarnas', 'Gavleborgs', 'Gotlands', 'Hallands', 'Jamtlands', 'Jonkopings', 'Kalmar', 'Kronobergs', 'Norrbottens', 'Orebro', 'Ostergotlands', 'Skane', 'Sodermanlands', 'Stockholms', 'Uppsala', 'Varmlands', 'Vasterbottens', 'Vasternorrlands', 'Vastmanlands', 'Vastra Gotalands',
            ),
        ),
        'CHE' => array(
            'name' => 'Switzerland',
            'country_code' => 41,
            'iso' => array(
                'alpha_2' => 'CH',
                'alpha_3' => 'CHE',
                'numeric' => 756,
                '3166_2' => 'ISO 3166_2:CH',
            ),
            'provinces' => array(
                'Aargau', 'Ausser-Rhoden', 'Basel-Landschaft', 'Basel-Stadt', 'Bern', 'Fribourg', 'Geneve', 'Glarus', 'Graubunden', 'Inner-Rhoden', 'Jura', 'Luzern', 'Neuchatel', 'Nidwalden', 'Obwalden', 'Sankt Gallen', 'Schaffhausen', 'Schwyz', 'Solothurn', 'Thurgau', 'Ticino', 'Uri', 'Valais', 'Vaud', 'Zug', 'Zurich',
            ),
        ),
        'SYR' => array(
            'name' => 'Syrian Arab Republic',
            'country_code' => 963,
            'iso' => array(
                'alpha_2' => 'SY',
                'alpha_3' => 'SYR',
                'numeric' => 760,
                '3166_2' => 'ISO 3166_2:SY',
            ),
            'provinces' => array(
                'Al Hasakah', 'Al Ladhiqiyah', 'Al Qunaytirah', 'Ar Raqqah', 'As Suwayda&#8217;', 'Dar&#8217;a', 'Dayr az Zawr', 'Dimashq', 'Halab', 'Hamah', 'Hims', 'Idlib', 'Rif Dimashq', 'Tartus'
            ),
        ),
        'TWN' => array(
            'name' => 'Taiwan',
            'country_code' => 886,
            'iso' => array(
                'alpha_2' => 'TW',
                'alpha_3' => 'TWN',
                'numeric' => 158,
                '3166_2' => 'ISO 3166_2:TW',
            ),
            'provinces' => array(
                'Chang-hua', 'Chi-lung', 'Chia-i', 'Chia-i', 'Chung-hsing-hsin-ts&#8217;un', 'Hsin-chu', 'Hsin-chu', 'Hua-lien', 'I-lan', 'Kao-hsiung', 'Kao-hsiung', 'Miao-li', 'Nan-t&#8217;ou', 'P&#8217;eng-hu', 'P&#8217;ing-tung', 'T&#8217;ai-chung', 'T&#8217;ai-chung', 'T&#8217;ai-nan', 'T&#8217;ai-nan', 'T&#8217;ai-pei', 'T&#8217;ai-pei', 'T&#8217;ai-tung', 'T&#8217;ao-yuan', 'Yun-lin'
            ),
        ),
        'TJK' => array(
            'name' => 'Tajikistan',
            'country_code' => 992,
            'iso' => array(
                'alpha_2' => 'TJ',
                'alpha_3' => 'TJK',
                'numeric' => 762,
                '3166_2' => 'ISO 3166_2:TJ',
            ),
            'provinces' => array(
                'Viloyati Khatlon', 'Viloyati Leninobod', 'Viloyati Mukhtori Kuhistoni Badakhshon',
            ),
        ),
        'TZA' => array(
            'name' => 'Tanzania United Republic of',
            'country_code' => 255,
            'iso' => array(
                'alpha_2' => 'TZ',
                'alpha_3' => 'TZA',
                'numeric' => 834,
                '3166_2' => 'ISO 3166_2:TZ',
            ),
            'provinces' => array(
                'Arusha', 'Dar es Salaam', 'Dodoma', 'Iringa', 'Kagera', 'Kigoma', 'Kilimanjaro', 'Lindi', 'Mara', 'Mbeya', 'Morogoro', 'Mtwara', 'Mwanza', 'Pemba North', 'Pemba South', 'Pwani', 'Rukwa', 'Ruvuma', 'Shinyanga', 'Singida', 'Tabora', 'Tanga', 'Zanzibar Central/South', 'Zanzibar North', 'Zanzibar Urban/West',
            ),
        ),
        'THA' => array(
            'name' => 'Thailand',
            'country_code' => 66,
            'iso' => array(
                'alpha_2' => 'TH',
                'alpha_3' => 'THA',
                'numeric' => 764,
                '3166_2' => 'ISO 3166_2:TH',
            ),
            'provinces' => array(
                'Amnat Charoen', 'Ang Thong', 'Buriram', 'Chachoengsao', 'Chai Nat', 'Chaiyaphum', 'Chanthaburi', 'Chiang Mai', 'Chiang Rai', 'Chon Buri', 'Chumphon', 'Kalasin', 'Kamphaeng Phet', 'Kanchanaburi', 'Khon Kaen', 'Krabi', 'Krung Thep Mahanakhon (Bangkok)', 'Lampang', 'Lamphun', 'Loei', 'Lop Buri', 'Mae Hong Son', 'Maha Sarakham', 'Mukdahan', 'Nakhon Nayok', 'Nakhon Pathom', 'Nakhon Phanom', 'Nakhon Ratchasima', 'Nakhon Sawan', 'Nakhon Si Thammarat', 'Nan', 'Narathiwat', 'Nong Bua Lamphu', 'Nong Khai', 'Nonthaburi', 'Pathum Thani', 'Pattani', 'Phangnga', 'Phatthalung', 'Phayao', 'Phetchabun', 'Phetchaburi', 'Phichit', 'Phitsanulok', 'Phra Nakhon Si Ayutthaya', 'Phrae', 'Phuket', 'Prachin Buri', 'Prachuap Khiri Khan', 'Ranong', 'Ratchaburi', 'Rayong', 'Roi Et', 'Sa Kaeo', 'Sakon Nakhon', 'Samut Prakan', 'Samut Sakhon', 'Samut Songkhram', 'Sara Buri', 'Satun', 'Sing Buri', 'Sisaket', 'Songkhla', 'Sukhothai', 'Suphan Buri', 'Surat Thani', 'Surin', 'Tak', 'Trang', 'Trat', 'Ubon Ratchathani', 'Udon Thani', 'Uthai Thani', 'Uttaradit', 'Yala', 'Yasothon',
            ),
        ),
        'TLS' => array(
            'name' => 'Timor-Leste',
            'country_code' => 670,
            'iso' => array(
                'alpha_2' => 'TL',
                'alpha_3' => 'TLS',
                'numeric' => 626,
                '3166_2' => 'ISO 3166_2:TL',
            ),
            'provinces' => array(
                'Timor-Leste'
            ),
        ),
        'TGO' => array(
            'name' => 'Togo',
            'country_code' => 228,
            'iso' => array(
                'alpha_2' => 'TG',
                'alpha_3' => 'TGO',
                'numeric' => 768,
                '3166_2' => 'ISO 3166_2:TG',
            ),
            'provinces' => array(
                'De La Kara', 'Des Plateaux', 'Des Savanes', 'Du Centre', 'Maritime',
            ),
        ),
        'TKL' => array(
            'name' => 'Tokelau',
            'country_code' => 690,
            'iso' => array(
                'alpha_2' => 'TK',
                'alpha_3' => 'TKL',
                'numeric' => 772,
                '3166_2' => 'ISO 3166_2:TK',
            ),
            'provinces' => array(
                'Atafu', 'Fakaofo', 'Nukunonu',
            ),
        ),
        'TON' => array(
            'name' => 'Tonga',
            'country_code' => 676,
            'iso' => array(
                'alpha_2' => 'TO',
                'alpha_3' => 'TON',
                'numeric' => 776,
                '3166_2' => 'ISO 3166_2:TO',
            ),
            'provinces' => array(
                'Ha&#8217;apai', 'Tongatapu', 'Vava&#8217;u'
            ),
        ),
        'TTO' => array(
            'name' => 'Trinidad and Tobago',
            'country_code' => '1 868',
            'iso' => array(
                'alpha_2' => 'TT',
                'alpha_3' => 'TTO',
                'numeric' => 780,
                '3166_2' => 'ISO 3166_2:TT',
            ),
            'provinces' => array(
                'Arima', 'Caroni', 'Mayaro', 'Nariva', 'Port-of-Spain', 'Saint Andrew', 'Saint David', 'Saint George', 'Saint Patrick', 'San Fernando', 'Victoria', 'Tobago',
            ),
        ),
        'TUN' => array(
            'name' => 'Tunisia',
            'country_code' => 216,
            'iso' => array(
                'alpha_2' => 'TN',
                'alpha_3' => 'TUN',
                'numeric' => 788,
                '3166_2' => 'ISO 3166_2:TN',
            ),
            'provinces' => array(
                'Ariana', 'Beja', 'Ben Arous', 'Bizerte', 'El Kef', 'Gabes', 'Gafsa', 'Jendouba', 'Kairouan', 'Kasserine', 'Kebili', 'Mahdia', 'Medenine', 'Monastir', 'Nabeul', 'Sfax', 'Sidi Bou Zid', 'Siliana', 'Sousse', 'Tataouine', 'Tozeur', 'Tunis', 'Zaghouan',
            ),
        ),
        'TUR' => array(
            'name' => 'Turkey',
            'country_code' => 90,
            'iso' => array(
                'alpha_2' => 'TR',
                'alpha_3' => 'TUR',
                'numeric' => 792,
                '3166_2' => 'ISO 3166_2:TR',
            ),
            'provinces' => array(
                'Adana', 'Adiyaman', 'Afyon', 'Agri', 'Aksaray', 'Amasya', 'Ankara', 'Antalya', 'Ardahan', 'Artvin', 'Aydin', 'Balikesir', 'Bartin', 'Batman', 'Bayburt', 'Bilecik', 'Bingol', 'Bitlis', 'Bolu', 'Burdur', 'Bursa', 'Canakkale', 'Cankiri', 'Corum', 'Denizli', 'Diyarbakir', 'Duzce', 'Edirne', 'Elazig', 'Erzincan', 'Erzurum', 'Eskisehir', 'Gaziantep', 'Giresun', 'Gumushane', 'Hakkari', 'Hatay', 'Icel', 'Igdir', 'Isparta', 'Istanbul', 'Izmir', 'Kahramanmaras', 'Karabuk', 'Karaman', 'Kars', 'Kastamonu', 'Kayseri', 'Kilis', 'Kirikkale', 'Kirklareli', 'Kirsehir', 'Kocaeli', 'Konya', 'Kutahya', 'Malatya', 'Manisa', 'Mardin', 'Mugla', 'Mus', 'Nevsehir', 'Nigde', 'Ordu', 'Osmaniye', 'Rize', 'Sakarya', 'Samsun', 'Sanliurfa', 'Siirt', 'Sinop', 'Sirnak', 'Sivas', 'Tekirdag', 'Tokat', 'Trabzon', 'Tunceli', 'Usak', 'Van', 'Yalova', 'Yozgat', 'Zonguldak',
            ),
        ),
        'TKM' => array(
            'name' => 'Turkmenistan',
            'country_code' => 993,
            'iso' => array(
                'alpha_2' => 'TM',
                'alpha_3' => 'TKM',
                'numeric' => 795,
                '3166_2' => 'ISO 3166_2:TM',
            ),
            'provinces' => array(
                'Ahal Welayaty', 'Balkan Welayaty', 'Dashhowuz Welayaty', 'Lebap Welayaty', 'Mary Welayaty',
            ),
        ),
        'TCA' => array(
            'name' => 'Turks and Caicos Islands',
            'country_code' => '1 649',
            'iso' => array(
                'alpha_2' => 'TC',
                'alpha_3' => 'TCA',
                'numeric' => 796,
                '3166_2' => 'ISO 3166_2:TC',
            ),
            'provinces' => array(
                'Turks and Caicos Islands',
            ),
        ),
        'TUV' => array(
            'name' => 'Tuvalu',
            'country_code' => 688,
            'iso' => array(
                'alpha_2' => 'TV',
                'alpha_3' => 'TUV',
                'numeric' => 798,
                '3166_2' => 'ISO 3166_2:TV',
            ),
            'provinces' => array(
                'Tuvalu',
            ),
        ),
        'UGA' => array(
            'name' => 'Uganda',
            'country_code' => 256,
            'iso' => array(
                'alpha_2' => 'UG',
                'alpha_3' => 'UGA',
                'numeric' => 800,
                '3166_2' => 'ISO 3166_2:UG',
            ),
            'provinces' => array(
                'Adjumani', 'Apac', 'Arua', 'Bugiri', 'Bundibugyo', 'Bushenyi', 'Busia', 'Gulu', 'Hoima', 'Iganga', 'Jinja', 'Kabale', 'Kabarole', 'Kalangala', 'Kampala', 'Kamuli', 'Kapchorwa', 'Kasese', 'Katakwi', 'Kibale', 'Kiboga', 'Kisoro', 'Kitgum', 'Kotido', 'Kumi', 'Lira', 'Luwero', 'Masaka', 'Masindi', 'Mbale', 'Mbarara', 'Moroto', 'Moyo', 'Mpigi', 'Mubende', 'Mukono', 'Nakasongola', 'Nebbi', 'Ntungamo', 'Pallisa', 'Rakai', 'Rukungiri', 'Sembabule', 'Soroti', 'Tororo',
            ),
        ),
        'UKR' => array(
            'name' => 'Ukraine',
            'country_code' => 380,
            'iso' => array(
                'alpha_2' => 'UA',
                'alpha_3' => 'UKR',
                'numeric' => 804,
                '3166_2' => 'ISO 3166_2:UA',
            ),
            'provinces' => array(
                'Avtonomna Respublika Krym (Simferopol&#8217;)', 'Cherkas&#8217;ka (Cherkasy)', 'Chernihivs&#8217;ka (Chernihiv)', 'Chernivets&#8217;ka (Chernivtsi)', 'Dnipropetrovs&#8217;ka (Dnipropetrovs&#8217;k)', 'Donets&#8217;ka (Donets&#8217;k)', 'Ivano-Frankivs&#8217;ka (Ivano-Frankivs&#8217;k)', 'Kharkivs&#8217;ka (Kharkiv)', 'Khersons&#8217;ka (Kherson)', 'Khmel&#8217;nyts&#8217;ka (Khmel&#8217;nyts&#8217;kyy)', 'Kirovohrads&#8217;ka (Kirovohrad)', 'Kyyiv', 'Kyyivs&#8217;ka (Kiev)', 'L&#8217;vivs&#8217;ka (L&#8217;viv)', 'Luhans&#8217;ka (Luhans&#8217;k)', 'Mykolayivs&#8217;ka (Mykolayiv)', 'Odes&#8217;ka (Odesa)', 'Poltavs&#8217;ka (Poltava)', 'Rivnens&#8217;ka (Rivne)', 'Sevastopol&#8217;', 'Sums&#8217;ka (Sumy)', 'Ternopil&#8217;s&#8217;ka (Ternopil&#8217;)', 'Vinnyts&#8217;ka (Vinnytsya)', 'Volyns&#8217;ka (Luts&#8217;k)', 'Zakarpats&#8217;ka (Uzhhorod)', 'Zaporiz&#8217;ka (Zaporizhzhya)', 'Zhytomyrs&#8217;ka (Zhytomyr)'
            ),
        ),
        'ARE' => array(
            'name' => 'United Arab Emirates',
            'country_code' => 971,
            'iso' => array(
                'alpha_2' => 'AE',
                'alpha_3' => 'ARE',
                'numeric' => 784,
                '3166_2' => 'ISO 3166_2:AE',
            ),
            'provinces' => array(
                '&#8217;Ajman', 'Abu Zaby (Abu Dhabi)', 'Al Fujayrah', 'Ash Shariqah (Sharjah)', 'Dubayy (Dubai)', 'Ra&#8217;s al Khaymah', 'Umm al Qaywayn'
            ),
        ),
        'GBR' => array(
            'name' => 'United Kingdom',
            'country_code' => 44,
            'iso' => array(
                'alpha_2' => 'GB',
                'alpha_3' => 'GBR',
                'numeric' => 826,
                '3166_2' => 'ISO 3166_2:GB',
            ),
            'provinces' => array(
                'Aberdeenshire', 'Alderney', 'Angus', 'Antrim', 'Argyll', 'Armagh', 'Avon', 'Ayrshire', 'Banffshire', 'Bedfordshire', 'Berkshire', 'Berwickshire', 'Blaenau Gwent', 'Borders', 'Bridgend', 'Buckinghamshire', 'Bute', 'Caerphilly', 'Caithness', 'Cambridgeshire', 'Cardiff', 'Carmarthenshire', 'Central', 'Ceredigion', 'Cheshire', 'Clackmannanshire', 'Cleveland', 'Clwyd', 'Co. Antrim', 'Co. Armagh', 'Co. Derry', 'Co. Down', 'Co. Fermanagh', 'Co. Tyrone', 'Conwy', 'Cornwall', 'Cumberland', 'Cumbria', 'Denbighshire', 'Derbyshire', 'Derry', 'Devon', 'Dorset', 'Down', 'Dumfries & Galloway', 'Dumfriesshire', 'Dunbartonshire', 'Durham', 'Dyfed', 'East Lothian', 'East Sussex', 'Essex', 'Fermanagh', 'Fife', 'Flintshire', 'Gloucestershire', 'Grampian', 'Greater London', 'Greater Manchester', 'Guernsey', 'Gwent', 'Gwynedd', 'Hampshire', 'Hereford & Worcester', 'Herefordshire', 'Hertfordshire', 'Highland', 'Humberside', 'Huntingdonshire', 'Inverness', 'Isle Of Man', 'Isle of Anglesey', 'Isle of Wight', 'Jersey', 'Kent', 'Kincardineshire', 'Kinross-shire', 'Kirkcudbrightshire', 'Lanarkshire', 'Lancashire', 'Leicestershire', 'Lincolnshire', 'Lothian', 'Merseyside', 'Merthyr Tydfil', 'Mid Glamorgan', 'Middlesex', 'Midlothian', 'Monmouthshire', 'Moray', 'Nairnshire', 'Neath Port Talbot', 'Newport', 'Norfolk', 'North Yorkshire', 'Northamptonshire', 'Northumberland', 'Nottinghamshire', 'Orkney', 'Oxfordshire', 'Peebleshire', 'Pembrokeshire', 'Perthshire', 'Powys', 'Renfrewshire', 'Rhondda Cynon Taff', 'Ross & Cromarty', 'Roxburghshire', 'Rutland', 'Scotland', 'Selkirkshire', 'Shetland', 'Shropshire', 'Somerset', 'South Glamorgan', 'South Yorkshire', 'Staffordshire', 'Stirlingshire', 'Strathclyde', 'Suffolk', 'Surrey', 'Sussex', 'Sutherland', 'Swansea', 'Tayside', 'Torfaen', 'Tyne & Wear', 'Tyne and Wear', 'Tyrone', 'Vale of Glamorgan', 'Wales', 'Warwickshire', 'West Glamorgan', 'West Lothian', 'West Midlands', 'West Riding', 'West Sussex', 'West Yorkshire', 'Western Isles', 'Westmoorland', 'Westmorland', 'Wigtownshire', 'Wiltshire', 'Worcestershire', 'Wrexham', 'Yorkshire',
            ),
        ),
        'USA' => array(
            'name' => 'United States',
            'country_code' => 1,
            'iso' => array(
                'alpha_2' => 'US',
                'alpha_3' => 'USA',
                'numeric' => 840,
                '3166_2' => 'ISO 3166_2:US',
            ),
            'provinces' => array(
                'Alaska', 'Alabama', 'Arkansas', 'Arizona', 'California', 'Colorado', 'Connecticut', 'Washington, D.C.', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Iowa', 'Idaho', 'Illinois', 'Indiana', 'Kansas', 'Kentucky', 'Louisiana', 'Massachusetts', 'Maryland', 'Maine', 'Michigan', 'Minnesota', 'Missouri', 'Mississippi', 'Montana', 'North Carolina', 'North Dakota', 'Nebraska', 'New Hampshire', 'New Jersey', 'New Mexico', 'Nevada', 'New York', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Virginia', 'Vermont', 'Washington', 'Wisconsin', 'West Virginia', 'Wyoming',
            ),
        ),
        'UMI' => array(
            'name' => 'United States Minor Outlying Islands',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'UM',
                'alpha_3' => 'UMI',
                'numeric' => 581,
                '3166_2' => 'ISO 3166_2:UM',
            ),
            'provinces' => array(
                'United States Minor Outlying Islands'
            ),
        ),
        'URY' => array(
            'name' => 'Uruguay',
            'country_code' => 598,
            'iso' => array(
                'alpha_2' => 'UY',
                'alpha_3' => 'URY',
                'numeric' => 858,
                '3166_2' => 'ISO 3166_2:UY',
            ),
            'provinces' => array(
                'Artigas', 'Canelones', 'Cerro Largo', 'Colonia', 'Durazno', 'Flores', 'Florida', 'Lavalleja', 'Maldonado', 'Montevideo', 'Paysandu', 'Rio Negro', 'Rivera', 'Rocha', 'Salto', 'San Jose', 'Soriano', 'Tacuarembo', 'Treinta y Tres',
            ),
        ),
        'UZB' => array(
            'name' => 'Uzbekistan',
            'country_code' => 998,
            'iso' => array(
                'alpha_2' => 'UZ',
                'alpha_3' => 'UZB',
                'numeric' => 860,
                '3166_2' => 'ISO 3166_2:UZ',
            ),
            'provinces' => array(
                'Andijon Wiloyati', 'Bukhoro Wiloyati', 'Farghona Wiloyati', 'Jizzakh Wiloyati', 'Khorazm Wiloyati (Urganch)', 'Namangan Wiloyati', 'Nawoiy Wiloyati', 'Qashqadaryo Wiloyati (Qarshi)', 'Qoraqalpoghiston (Nukus)', 'Samarqand Wiloyati', 'Sirdaryo Wiloyati (Guliston)', 'Surkhondaryo Wiloyati (Termiz)', 'Toshkent Shahri', 'Toshkent Wiloyati',
            ),
        ),
        'VUT' => array(
            'name' => 'Vanuatu',
            'country_code' => 678,
            'iso' => array(
                'alpha_2' => 'VU',
                'alpha_3' => 'VUT',
                'numeric' => 548,
                '3166_2' => 'ISO 3166_2:VU',
            ),
            'provinces' => array(
                'Malampa', 'Penama', 'Sanma', 'Shefa', 'Tafea', 'Torba',
            ),
        ),
        'VEN' => array(
            'name' => 'Venezuela, Bolivarian Republic of',
            'country_code' => 58,
            'iso' => array(
                'alpha_2' => 'VE',
                'alpha_3' => 'VEN',
                'numeric' => 862,
                '3166_2' => 'ISO 3166_2:VE',
            ),
            'provinces' => array(
                'Amazonas', 'Anzoategui', 'Apure', 'Aragua', 'Barinas', 'Bolivar', 'Carabobo', 'Cojedes', 'Delta Amacuro', 'Dependencias Federales', 'Distrito Federal', 'Falcon', 'Guarico', 'Lara', 'Merida', 'Miranda', 'Monagas', 'Nueva Esparta', 'Portuguesa', 'Sucre', 'Tachira', 'Trujillo', 'Vargas', 'Yaracuy', 'Zulia',
            ),
        ),
        'VNM' => array(
            'name' => 'Viet Nam',
            'country_code' => 84,
            'iso' => array(
                'alpha_2' => 'VN',
                'alpha_3' => 'VNM',
                'numeric' => 704,
                '3166_2' => 'ISO 3166_2:VN',
            ),
            'provinces' => array(
                'An Giang', 'Ba Ria-Vung Tau', 'Bac Giang', 'Bac Kan', 'Bac Lieu', 'Bac Ninh', 'Ben Tre', 'Binh Dinh', 'Binh Duong', 'Binh Phuoc', 'Binh Thuan', 'Ca Mau', 'Can Tho', 'Cao Bang', 'Da Nang', 'Dac Lak', 'Dong Nai', 'Dong Thap', 'Gia Lai', 'Ha Giang', 'Ha Nam', 'Ha Noi', 'Ha Tay', 'Ha Tinh', 'Hai Duong', 'Hai Phong', 'Ho Chi Minh', 'Hoa Binh', 'Hung Yen', 'Khanh Hoa', 'Kien Giang', 'Kon Tum', 'Lai Chau', 'Lam Dong', 'Lang Son', 'Lao Cai', 'Long An', 'Nam Dinh', 'Nghe An', 'Ninh Binh', 'Ninh Thuan', 'Phu Tho', 'Phu Yen', 'Quang Binh', 'Quang Nam', 'Quang Ngai', 'Quang Ninh', 'Quang Tri', 'Soc Trang', 'Son La', 'Tay Ninh', 'Thai Binh', 'Thai Nguyen', 'Thanh Hoa', 'Thua Thien-Hue', 'Tien Giang', 'Tra Vinh', 'Tuyen Quang', 'Vinh Long', 'Vinh Phuc', 'Yen Bai',
            ),
        ),
        'VGB' => array(
            'name' => 'Virgin Islands British',
            'country_code' => '1 284',
            'iso' => array(
                'alpha_2' => 'VG',
                'alpha_3' => 'VGB',
                'numeric' => 092,
                '3166_2' => 'ISO 3166_2:VG',
            ),
            'provinces' => array(
                'Anegada', 'Jost Van Dyke', 'Tortola', 'Virgin Gorda',
            ),
        ),
        'VIR' => array(
            'name' => 'Virgin Islands U.S.',
            'country_code' => '1 340',
            'iso' => array(
                'alpha_2' => 'VI',
                'alpha_3' => 'VIR',
                'numeric' => 850,
                '3166_2' => 'ISO 3166_2:VI',
            ),
            'provinces' => array(
                'Saint Croix', 'Saint John', 'Saint Thomas',
            ),
        ),
        'WLF' => array(
            'name' => 'Wallis and Futuna',
            'country_code' => 681,
            'iso' => array(
                'alpha_2' => 'WF',
                'alpha_3' => 'WLF',
                'numeric' => 876,
                '3166_2' => 'ISO 3166_2:WF',
            ),
            'provinces' => array(
                'Alo', 'Sigave', 'Wallis',
            ),
        ),
        'ESH' => array(
            'name' => 'Western Sahara',
            'country_code' => null,
            'iso' => array(
                'alpha_2' => 'EH',
                'alpha_3' => 'ESH',
                'numeric' => 732,
                '3166_2' => 'ISO 3166_2:EH',
            ),
            'provinces' => array(
                'Western Sahara'
            ),
        ),
        'YEM' => array(
            'name' => 'Yemen',
            'country_code' => 967,
            'iso' => array(
                'alpha_2' => 'YE',
                'alpha_3' => 'YEM',
                'numeric' => 887,
                '3166_2' => 'ISO 3166_2:YE',
            ),
            'provinces' => array(
                '&#8217;Adan', '&#8217;Ataq', 'Abyan', 'Al Bayda&#8217;', 'Al Hudaydah', 'Al Jawf', 'Al Mahrah', 'Al Mahwit', 'Dhamar', 'Hadhramawt', 'Hajjah', 'Ibb', 'Lahij', 'Ma&#8217;rib', 'Sa&#8217;dah', 'San&#8217;a&#8217;', 'Ta&#8217;izz'
            ),
        ),
        'ZMB' => array(
            'name' => 'Zambia',
            'country_code' => 260,
            'iso' => array(
                'alpha_2' => 'ZM',
                'alpha_3' => 'ZMB',
                'numeric' => 894,
                '3166_2' => 'ISO 3166_2:ZM',
            ),
            'provinces' => array(
                'Central', 'Copperbelt', 'Eastern', 'Luapula', 'Lusaka', 'North-Western', 'Northern', 'Southern', 'Western',
            ),
        ),
        'ZWE' => array(
            'name' => 'Zimbabwe',
            'country_code' => 263,
            'iso' => array(
                'alpha_2' => 'ZW',
                'alpha_3' => 'ZWE',
                'numeric' => 716,
                '3166_2' => 'ISO 3166_2:ZW',
            ),
            'provinces' => array(
                'Bulawayo', 'Harare', 'ManicalandMashonaland Central', 'Mashonaland East', 'Mashonaland West', 'Masvingo', 'Matabeleland North', 'Matabeleland South', 'Midlands',
            ),
        )
    );

}
