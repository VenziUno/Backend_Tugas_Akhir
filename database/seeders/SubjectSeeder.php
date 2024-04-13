<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::truncate();
        Subject::insert([
            [
                'id' => 'S000',
                'name' => 'Generalities',
                'classification_code' => '000',
                'subjects_type' => 'Pengetahuan Umum, Informasi',

            ],
            [
                'id' => 'S001',
                'name' => 'Knowledge',
                'classification_code' => '001',
                'subjects_type' => 'Teori Pengetahuan, Ilmu Informasi',

            ],
            [
                'id' => 'S002',
                'name' => 'The book',
                'classification_code' => '002',
                'subjects_type' => 'Bibliografi, Ilmu Perpustakaan',

            ],
            [
                'id' => 'S003',
                'name' => 'Systems',
                'classification_code' => '003',
                'subjects_type' => 'Teori Sistem, Kibernetika',

            ],
            [
                'id' => 'S004',
                'name' => 'Computer Science',
                'classification_code' => '004',
                'subjects_type' => 'Ilmu Komputer, Pemrograman Komputer',

            ],
            [
                'id' => 'S005',
                'name' => 'Computer programming',
                'classification_code' => '005',
                'subjects_type' => 'Pengembangan Perangkat Lunak, Pemrograman',

            ],
            [
                'id' => 'S006',
                'name' => 'Special Computer Methods',
                'classification_code' => '006',
                'subjects_type' => 'Kecerdasan Buatan, Grafika Komputer',

            ],
            [
                'id' => 'S007',
                'name' => 'Bibliography',
                'classification_code' => '010',
                'subjects_type' => 'Bibliografi, Katalog',

            ],
            [
                'id' => 'S008',
                'name' => 'Bibliographies',
                'classification_code' => '011',
                'subjects_type' => 'Bibliografi Menurut Topik',

            ],
            [
                'id' => 'S009',
                'name' => 'Encyclopedias',
                'classification_code' => '013',
                'subjects_type' => 'Ensiklopedia, Kamus',

            ],
            [
                'id' => 'S010',
                'name' => 'General Encyclopedic Works',
                'classification_code' => '016',
                'subjects_type' => 'Ensiklopedia Umum',

            ],
            [
                'id' => 'S011',
                'name' => 'Subject-specific Encyclopedias',
                'classification_code' => '017',
                'subjects_type' => 'Ensiklopedia Khusus Subjek',

            ],
            [
                'id' => 'S012',
                'name' => 'Library & Information Sciences',
                'classification_code' => '020',
                'subjects_type' => 'Ilmu Perpustakaan, Layanan Informasi',

            ],
            [
                'id' => 'S013',
                'name' => 'Library Relationships',
                'classification_code' => '021',
                'subjects_type' => 'Perpustakaan, Asosiasi',

            ],
            [
                'id' => 'S014',
                'name' => 'Administration',
                'classification_code' => '022',
                'subjects_type' => 'Manajemen Perpustakaan, Administrasi',

            ],
            [
                'id' => 'S015',
                'name' => 'Personnel Management',
                'classification_code' => '023',
                'subjects_type' => 'Staf Perpustakaan, Pelatihan',

            ],
            [
                'id' => 'S016',
                'name' => 'Library Operations',
                'classification_code' => '025',
                'subjects_type' => 'Operasi Perpustakaan, Akuisisi',

            ],
            [
                'id' => 'S017',
                'name' => 'Libraries for Specific Subjects',
                'classification_code' => '026',
                'subjects_type' => 'Perpustakaan Khusus Subjek',

            ],
            [
                'id' => 'S018',
                'name' => 'General Libraries',
                'classification_code' => '027',
                'subjects_type' => 'Perpustakaan Umum',

            ],
            [
                'id' => 'S019',
                'name' => 'Reading & Use of Other Information Media',
                'classification_code' => '028',
                'subjects_type' => 'Keterampilan Membaca, Literasi Informasi',

            ],
            [
                'id' => 'S021',
                'name' => 'General periodicals',
                'classification_code' => '050',
                'subjects_type' => 'Jurnal Umum',

            ],
            [
                'id' => 'S022',
                'name' => 'Serial publications',
                'classification_code' => '051',
                'subjects_type' => 'Publikasi Seri',

            ],
            [
                'id' => 'S023',
                'name' => 'General organizations & museum',
                'classification_code' => '060',
                'subjects_type' => 'Organisasi Umum, Museum',

            ],
            [
                'id' => 'S024',
                'name' => 'Organizations',
                'classification_code' => '061',
                'subjects_type' => 'Organisasi',

            ],
            [
                'id' => 'S025',
                'name' => 'News media, journalism, publishing',
                'classification_code' => '070',
                'subjects_type' => 'Media Berita, Jurnalisme, Penerbitan',

            ],
            [
                'id' => 'S026',
                'name' => 'Quotations',
                'classification_code' => '080',
                'subjects_type' => 'Kutipan',

            ],
            [
                'id' => 'S027',
                'name' => 'Manuscripts & rare books',
                'classification_code' => '090',
                'subjects_type' => 'Naskah dan Buku Langka',

            ],
            [
                'id' => 'S028',
                'name' => 'Manuscripts',
                'classification_code' => '091',
                'subjects_type' => 'Naskah',

            ],
            [
                'id' => 'S029',
                'name' => 'Block books',
                'classification_code' => '092',
                'subjects_type' => 'Buku Blok',

            ],
            [
                'id' => 'S030',
                'name' => 'Incunabula',
                'classification_code' => '093',
                'subjects_type' => 'Inkunabula',

            ],
            [
                'id' => 'S031',
                'name' => 'Books notable for bindings',
                'classification_code' => '095',
                'subjects_type' => 'Buku yang menonjolkan pembalutan',

            ],
            [
                'id' => 'S032',
                'name' => 'Books notable for illustrations',
                'classification_code' => '096',
                'subjects_type' => 'Buku yang menonjolkan ilustrasi',

            ],
            [
                'id' => 'S033',
                'name' => 'Books notable for ownership or origin',
                'classification_code' => '097',
                'subjects_type' => 'Buku yang menonjolkan kepemilikan atau asal',

            ],
            [
                'id' => 'S034',
                'name' => 'Philosophy',
                'classification_code' => '100',
                'subjects_type' => 'Filsafat',

            ],
        ]);
    }
}
