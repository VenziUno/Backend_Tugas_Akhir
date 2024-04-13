<?php

namespace Database\Seeders;

use App\Models\CarrierType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarrierTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        CarrierType::truncate();
        CarrierType::insert([
            [
                'id' => 'CAT001',
                'name' => 'aperature card',
                'code' => 'ha',
                'mrac' => 'ha',
                'created_at' => '2024-02-11 21:11:35',
                'updated_at' => '2024-02-11 21:11:35'
            ],
            [
                'id' => 'CAT002',
                'name' => 'audio cylinder',
                'code' => 'se',
                'mrac' => 'e',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT003',
                'name' => 'audio disc',
                'code' => 'sd',
                'mrac' => 'd',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT004',
                'name' => 'sound track reel',
                'code' => 'si',
                'mrac' => 'i',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT005',
                'name' => 'audio roll',
                'code' => 'sq',
                'mrac' => 'q',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT006',
                'name' => 'audiocassette',
                'code' => 'ss',
                'mrac' => 's',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT007',
                'name' => 'audiotape reel',
                'code' => 'st',
                'mrac' => 't',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT008',
                'name' => 'other (audio)',
                'code' => 'sz',
                'mrac' => 'z',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT009',
                'name' => 'computer card',
                'code' => 'ck',
                'mrac' => 'k',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT010',
                'name' => 'computer chip cartridge',
                'code' => 'cb',
                'mrac' => 'b',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT011',
                'name' => 'computer disc',
                'code' => 'cd',
                'mrac' => 'd',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT012',
                'name' => 'computer disc cartridge',
                'code' => 'ce',
                'mrac' => 'e',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT013',
                'name' => 'computer tape cartridge',
                'code' => 'ca',
                'mrac' => 'a',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT014',
                'name' => 'computer tape cassette',
                'code' => 'cf',
                'mrac' => 'f',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT015',
                'name' => 'computer tape reel',
                'code' => 'ch',
                'mrac' => 'h',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT016',
                'name' => 'online resource',
                'code' => 'cr',
                'mrac' => 'r',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT017',
                'name' => 'other (computer)',
                'code' => 'cz',
                'mrac' => 'z',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT018',
                'name' => 'aperture card',
                'code' => 'ha',
                'mrac' => 'a',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT019',
                'name' => 'microfiche',
                'code' => 'he',
                'mrac' => 'e',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT020',
                'name' => 'microfiche cassette',
                'code' => 'hf',
                'mrac' => 'f',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT021',
                'name' => 'microfilm cartridge',
                'code' => 'hb',
                'mrac' => 'b',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT022',
                'name' => 'microfilm cassette',
                'code' => 'hc',
                'mrac' => 'c',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT023',
                'name' => 'microfilm reel',
                'code' => 'hd',
                'mrac' => 'd',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT024',
                'name' => 'microfilm roll',
                'code' => 'hj',
                'mrac' => 'j',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT025',
                'name' => 'microfilm slip',
                'code' => 'hh',
                'mrac' => 'h',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT026',
                'name' => 'microopaque',
                'code' => 'hg',
                'mrac' => 'g',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT027',
                'name' => 'other (microform)',
                'code' => 'hz',
                'mrac' => 'z',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT028',
                'name' => 'microscope slide',
                'code' => 'pp',
                'mrac' => 'p',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT029',
                'name' => 'other (microscope)',
                'code' => 'pz',
                'mrac' => 'z',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT030',
                'name' => 'film cartridge',
                'code' => 'mc',
                'mrac' => 'c',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT031',
                'name' => 'film cassette',
                'code' => 'mf',
                'mrac' => 'f',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT032',
                'name' => 'film reel',
                'code' => 'mr',
                'mrac' => 'r',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT033',
                'name' => 'film roll',
                'code' => 'mo',
                'mrac' => 'o',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT034',
                'name' => 'filmslip',
                'code' => 'gd',
                'mrac' => 'd',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT035',
                'name' => 'filmstrip',
                'code' => 'gf',
                'mrac' => 'f',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT036',
                'name' => 'filmstrip cartridge',
                'code' => 'gc',
                'mrac' => 'c',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT037',
                'name' => 'overhead transparency',
                'code' => 'gt',
                'mrac' => 't',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT038',
                'name' => 'slide',
                'code' => 'gs',
                'mrac' => 's',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT039',
                'name' => 'other (projected image)',
                'code' => 'mz',
                'mrac' => 'z',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT040',
                'name' => 'stereograph card',
                'code' => 'eh',
                'mrac' => 'h',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT041',
                'name' => 'stereograph disc',
                'code' => 'es',
                'mrac' => 's',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT042',
                'name' => 'other (stereographic)',
                'code' => 'ez',
                'mrac' => 'z',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT043',
                'name' => 'card',
                'code' => 'no',
                'mrac' => 'o',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT044',
                'name' => 'flipchart',
                'code' => 'nn',
                'mrac' => 'n',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT045',
                'name' => 'roll',
                'code' => 'na',
                'mrac' => 'a',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT046',
                'name' => 'sheet',
                'code' => 'nb',
                'mrac' => 'b',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT047',
                'name' => 'volume',
                'code' => 'nc',
                'mrac' => 'c',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT048',
                'name' => 'object',
                'code' => 'nr',
                'mrac' => 'r',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT049',
                'name' => 'other (unmediated)',
                'code' => 'nz',
                'mrac' => NULL,
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT050',
                'name' => 'video cartridge',
                'code' => 'vc',
                'mrac' => NULL,
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT051',
                'name' => 'videocassette',
                'code' => 'vf',
                'mrac' => NULL,
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT052',
                'name' => 'videodisc',
                'code' => 'vd',
                'mrac' => NULL,
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT053',
                'name' => 'videotape reel',
                'code' => 'vr',
                'mrac' => NULL,
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT054',
                'name' => 'other (video)',
                'code' => 'vz',
                'mrac' => NULL,
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
            [
                'id' => 'CAT055',
                'name' => 'unspecified',
                'code' => 'zu',
                'mrac' => 'u',
                'created_at' => '2024-02-08 00:27:46',
                'updated_at' => '2024-02-08 00:27:46'
            ],
        ]);
    }
}
