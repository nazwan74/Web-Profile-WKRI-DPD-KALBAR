<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TentangKami;

class TentangKamiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TentangKami::create([
            'logo' => null,
            'filosofi_logo' => 'Logo WKRI memiliki makna yang mendalam dalam menggambarkan identitas dan visi organisasi. Setiap elemen dalam logo dirancang dengan cermat untuk merepresentasikan nilai-nilai yang dianut oleh WKRI.

Warna dan bentuk dalam logo mencerminkan semangat persatuan, keadilan, dan pelayanan yang menjadi landasan pergerakan WKRI dalam memberdayakan perempuan Katolik di Indonesia.',
            
            'tentang_kami' => 'WKRI (Wanita Katolik Republik Indonesia) adalah organisasi wanita Katolik yang berkomitmen untuk memberdayakan perempuan dalam berbagai aspek kehidupan. Didirikan dengan semangat pelayanan dan pengabdian, WKRI terus berperan aktif dalam pembangunan bangsa melalui berbagai program dan kegiatan yang berorientasi pada peningkatan kualitas hidup perempuan.

Organisasi ini mengemban misi untuk mengembangkan potensi perempuan Katolik agar dapat berperan aktif dalam keluarga, gereja, dan masyarakat. Melalui berbagai program pelatihan, pendidikan, dan kegiatan sosial, WKRI berupaya menciptakan perempuan yang mandiri, beriman, dan berkontribusi positif bagi lingkungan sekitarnya.',
            
            'sejarah' => 'WKRI (Wanita Katolik Republik Indonesia) didirikan pada tahun 1924 dengan nama awal "Wanita Katolik Indonesia". Organisasi ini lahir dari semangat para perempuan Katolik yang ingin berkontribusi dalam pembangunan bangsa dan gereja.

Sejak awal berdirinya, WKRI telah mengalami berbagai perkembangan dan penyesuaian sesuai dengan dinamika zaman. Organisasi ini terus berkomitmen untuk memberdayakan perempuan Katolik melalui berbagai program dan kegiatan yang relevan dengan kebutuhan masyarakat.

Sepanjang sejarahnya, WKRI telah berperan aktif dalam berbagai aspek pembangunan, termasuk pendidikan, kesehatan, ekonomi, dan sosial kemasyarakatan. Organisasi ini terus berkembang dan beradaptasi dengan tantangan zaman sambil tetap mempertahankan nilai-nilai dasar yang menjadi landasan pergerakannya.',
            
            'struktur_organisasi' => null
        ]);
    }
}
