<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Departements;
use App\Models\User;
use App\Models\polls;

class DepartementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departmentsData = [
            [
                'name' => 'Dinas Komunikasi Dan Informatika',
                'email' => 'diskominfo@gmail.com',
                'link_website' => 'https://diskominfo.pasuruankab.go.id/',
                'tugas' => [
                    'Pengelolaan Informasi Publik',
                    'Pengelolaan Teknologi Informasi',
                    'Pengembangan Situs Web dan Aplikasi',
                    'Pemberdayaan Teknologi untuk Pembangunan'
                ],
                'longitude' => '112.83017933350496',
                'latitude' => '-7.610029349872106',
            ],
            [
                'name' => 'Dinas Pendidikan Dan Kebudayaan',
                'email' => 'dispendikbud@gmail.com',
                'link_website' => 'https://dispendikbud.pasuruankab.go.id/',
                'tugas' => [
                    'Bertugas mengelola, mengembangkan, dan memantau sistem pendidikan di daerah',
                    'Penyedia dan pengawasan fasilitas pendidikan'
                ],
                'longitude' => '112.82760822792625',
                'latitude' => '-7.610079449692041',
            ],
            [
                'name' => 'Dinas Perindustrian Dan Perdagangan',
                'email' => 'disperindag@gmail.com',
                'link_website' => 'https://disperindag.pasuruankab.go.id//',
                'tugas' => [
                    'Pengembangan Industri',
                    'Perizinan Usaha',
                    'Promosi dan Pemasaran',
                    'Pemberdayaan UMKM'
                ],
                'longitude' => '112.8277581929433',
                'latitude' => '-7.609776193558369',
            ],
            // Tambahkan data dinas lainnya di sini
            [
                'name' => 'Dinas Bina Marga dan Bina Konstruksi',
                'email' => 'dinasbinamarga@gmail.com',
                'link_website' => 'https://dinasmarga.pasuruankab.go.id/',
                'tugas' => [
                    'Perencanaan dan pengawasan pembangunan infrastruktur jalan dan jembatan',
                    'Pemeliharaan jalan dan jembatan',
                    'Pengembangan dan inovasi teknologi konstruksi',
                ],
                'longitude' => '112.83029735070161',
                'latitude' => '-7.608990137318933',
            ],
            [
                'name' => 'Dinas Peternakan Dan Kesehatan Hewan',
                'email' => 'dinaspeternakan@gmail.com',
                'link_website' => 'https://dinaspeternakan.pasuruankab.go.id/',
                'tugas' => [
                    'Pengembangan dan pemeliharaan peternakan',
                    'Pengawasan kesehatan hewan',
                    'Peningkatan produksi dan kualitas produk peternakan',
                ],
                'longitude' => '112.82776534588268',
                'latitude' => '-7.610572291870198',
            ],
            [
                'name' => 'Dinas Pariwisata',
                'email' => 'dinaspariwisata@gmail.com',
                'link_website' => 'https://dinaspariwisata.pasuruankab.go.id/',
                'tugas' => [
                    'Promosi pariwisata daerah',
                    'Pengembangan atraksi wisata',
                    'Pengelolaan fasilitas pariwisata',
                    'Peningkatan kualitas pelayanan kepada wisatawan',
                ],
                'longitude' => '112.8268003,21',
                'latitude' => '-7.6106881',
            ],
            [
                'name' => 'Dinas Pemberdayaan Masyarakat Dan Desa',
                'email' => 'dinasdesa@gmail.com',
                'link_website' => 'https://dinasdesa.pasuruankab.go.id/',
                'tugas' => [
                    'Pemberdayaan masyarakat dan desa',
                    'Pelatihan dan pengembangan potensi masyarakat',
                    'Pendampingan program-program desa',
                ],
                'longitude' => '112.82514679869395',
                'latitude' => '-7.619630537264684',
            ],
            [
                'name' => 'Dinas Kesehatan',
                'email' => 'dinas_kesehatan@gmail.com',
                'link_website' => 'https://dinas_kesehatan.pasuruankab.go.id/',
                'tugas' => [
                    'Pengawasan dan pengendalian penyakit',
                    'Pelayanan kesehatan masyarakat',
                    'Promosi kesehatan dan kampanye vaksinasi',
                ],
                'longitude' => '112.82320699074568',
                'latitude' => '-7.625217740782138',
            ],
            [
                'name' => 'Dinas Lingkungan Hidup',
                'email' => 'dinas_lingkungan@gmail.com',
                'link_website' => 'https://dinas_lingkungan.pasuruankab.go.id/',
                'tugas' => [
                    'Pengelolaan limbah dan polusi',
                    'Pemantauan kualitas udara dan air',
                    'Penghijauan dan pelestarian alam',
                ],
                'longitude' => '112.82772740479522',
                'latitude' => '-7.62896187849378',
            ],
            [
                'name' => 'Dinas Sosial',
                'email' => 'dinas_sosial@gmail.com',
                'link_website' => 'https://dinas_sosial.pasuruankab.go.id/',
                'tugas' => [
                    'Pemberdayaan masyarakat kurang mampu',
                    'Penanggulangan bencana dan krisis sosial',
                    'Pengawasan perlindungan anak dan keluarga',
                ],
                'longitude' => '112.8249123456789',
                'latitude' => '-7.633514987654321',
            ],
            [
                'name' => 'Dinas Tenaga Kerja Dan Transmigrasi',
                'email' => 'dinastenagakerja@gmail.com',
                'link_website' => 'https://dinastenagakerja.pasuruankab.go.id/',
                'tugas' => [
                    'Pengembangan tenaga kerja dan pelatihan kerja',
                    'Penempatan tenaga kerja dan program transmigrasi',
                    'Pemberdayaan masyarakat dalam bidang ketenagakerjaan',
                ],
                'longitude' => '112.82574015394835',
                'latitude' => '-7.638213706514156',
            ],
            [
                'name' => 'Dinas Keluarga Berencana Dan Pemberdayaan Perempuan Dan Perlindungan Anak',
                'email' => 'dinas_kb@gmail.com',
                'link_website' => 'https://dinas_kb.pasuruankab.go.id/',
                'tugas' => [
                    'Promosi keluarga berencana dan kesehatan reproduksi',
                    'Pemberdayaan perempuan dan perlindungan anak',
                ],
                'longitude' => '112.82526049767076',
                'latitude' => '-7.64200078985347',
            ],
            [
                'name' => 'Dinas Koperasi Dan Usaha Mikro, Kecil, Dan Menengah',
                'email' => 'dinas_koperasi@gmail.com',
                'link_website' => 'https://dinas_koperasi.pasuruankab.go.id/',
                'tugas' => [
                    'Pengembangan koperasi dan UMKM',
                    'Pemberdayaan ekonomi masyarakat melalui koperasi',
                    'Pengawasan usaha mikro, kecil, dan menengah',
                ],
                'longitude' => '112.82786965359267',
                'latitude' => '-7.609670736219254',
            ],
            // ... add more departments data if needed
        ];


        foreach ($departmentsData as $data) {
        $department = DB::table('departements')->insertGetId([
            'name' => $data['name'],
            'email' => $data['email'],
            'link_website' => $data['link_website'],
            'tugas' => json_encode($data['tugas']),
            'longitude' => $data['longitude'],
            'latitude' => $data['latitude'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create admin user for each department
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt('password'),
            'department_id' => $department,
            'role' => 'admin',
        ]);
    }
        // Create users
        User::create([
            'name' => 'User 1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('password'),
            'department_id' => null,
            'role' => 'user',
        ]);
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('password'),
            'department_id' => null,
            'role' => 'superadmin',
        ]);
        

        $polls = [
            [
                'likes' => 0,
                'dislikes' => 0,
            ],
            // Tambahkan data polling lainnya sesuai kebutuhan
        ];
        foreach ($polls as $poll) {
            polls::create($poll);
        }
    }
}
