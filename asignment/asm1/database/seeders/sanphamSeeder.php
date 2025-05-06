<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sanphamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sanpham')->insert([
            [
                'ten' => 'Citizen BI5006-81P Quartz',
                'slug' => 'citizen-bi5006-81p-quartz',
                'anh' => 'sp1.jpg',
                'gia' => 30000000,
                'giaKM' => 29000000,
                'moTa' => 'Đồng hồ Citizen BI5006-81P Quartz là một trong những mẫu đồng hồ nam Citizen chính hãng được ưa chuộng nhất hiện nay. Với thiết kế mạnh mẽ, nam tính, mặt số tròn lớn, dây đeo kim loại chắc chắn, đồng hồ Citizen BI5006-81P Quartz sẽ là một lựa chọn hoàn hảo cho các quý ông.',
                'danhgia' => 4.5,
                'soluong' => 10,
                'id_loai' => 1
            ],
            //2
            [
                'ten' => 'Đồng Hồ Đeo Tay Nam Cao Cấp KIMSOUN',
                'slug' => 'dong-ho-deo-tay-nam-cao-cap-kimsoun',
                'anh' => 'sp2.webp',
                'gia' => 5000000,
                'giaKM' => 4900000,
                'moTa' => 'Đồng hồ nam Casio MTP-1374D-7AVDF là một trong những mẫu đồng hồ nam Casio chính hãng được ưa chuộng nhất hiện nay. Với thiết kế mạnh mẽ, nam tính, mặt số tròn lớn, dây đeo kim loại chắc chắn, đồng hồ nam Casio MTP-1374D-7AVDF sẽ là một lựa chọn hoàn hảo cho các quý ông.',
                'soluong' => 10,
                'id_loai' => 2
            ],
            //3
            [
                'ten' => 'Maserati Potenza Skeleton Dial Black Leather',
                'slug' => 'maserati-potenza-skeleton-dial-black-leather',
                'anh' => 'sp3.webp',
                'gia' => 10000000,
                'giaKM' => 9900000,
                'moTa' => 'Đồng hồ Maserati Potenza Skeleton Dial Black Leather là một trong những mẫu đồng hồ nam Maserati chính hãng được ưa chuộng nhất hiện nay. Với thiết kế mạnh mẽ, nam tính, mặt số tròn lớn, dây đeo kim loại chắc chắn, đồng hồ Maserati Potenza R8871621001 sẽ là một lựa chọn hoàn hảo cho các quý ông.',

                'soluong' => 10,
                'id_loai' => 3
            ],
            //4
            [
                'ten' => 'Classic Petite Unitone Rose Gold',
                'slug' => 'classic-petite-unitone-rose-gold',
                'anh' => 'sp4.jpg',
                'gia' => 10000000,
                'giaKM' => 9900000,
                'moTa' => 'Classic Petite Unitone Rose Gold với sự kết hợp hoàn hảo hài hòa về màu sắc vàng hồng tinh tế trên cả mặt và dây đồng hồ. Chất liệu thanh thoát bền bỉ giúp bạn nổi bật phong cách và tạo nét thu hút vô cùng thanh lịch.',

                'soluong' => 10,
                'id_loai' => 3
            ],
            //5
            [
                'ten' => 'Neos N-30855M Dây Thép Vàng',
                'slug' => 'neos-n-30855m-day-thep-vang',
                'anh' => 'sp5.webp',
                'gia' => 10000000,
                'giaKM' => 9900000,
                'moTa' => 'Đồng hồ nam chính hãng Neos N-30855M dây thép vàng là tuyệt tác sản phẩm cao cấp của thương hiệu đồng hồ Neos Thụy Sĩ. Với kinh nghiệm của ngành chế tác đồng hồ và là cái nôi của ngành đồng hồ thế giới Thụy Sĩ là quốc gia của ngành chế tác đồng hồ danh tiếng thế giới hàng trăm năm qua.',

                'soluong' => 10,
                'id_loai' => 3
            ],
            //6
            [
                'ten' => 'Đồng Hồ Nam Citizen AN8201-57L',
                'slug' => 'dong-ho-nam-citizen-an8201-57l',
                'anh' => 'sp6.jpg',
                'gia' => 10000000,
                'giaKM' => 9900000,
                'moTa' => 'Đồng Hồ Nam Citizen AN8201-57L với sự kết hợp hoàn hảo hài hòa về màu sắc vàng hồng tinh tế trên cả mặt và dây đồng hồ. Chất liệu thanh thoát bền bỉ giúp bạn nổi bật phong cách và tạo nét thu hút vô cùng thanh lịch.',

                'soluong' => 10,
                'id_loai' => 1
            ],
            //7
            [
                'ten' => 'Fossil Heritage ME3226 Automatic',
                'slug' => 'fossil-heritage-me3226-automatic',
                'anh' => 'sp7.webp',
                'gia' => 10000000,
                'giaKM' => 9900000,
                'moTa' => 'Fossil Heritage ME3226, chiếc đồng hồ cổ điển mạ vàng PVD cực sang trọng và đẳng cấp dành cho mọi quý ông. Sử dụng bộ máy cơ Nhật Bản cho chất lượng tuyệt vời, vận hành êm ái.',

                'soluong' => 10,
                'id_loai' => 1
            ],
            //8
            [
                'ten' => 'Đồng hồ Lobinni LB19069BGT-DT Automatic',
                'slug' => 'dong-ho-lobinni-lb19069bgt-dt-automatic',
                'anh' => 'sp8.jpg',
                'gia' => 10000000,
                'giaKM' => 9900000,
                'moTa' => 'Đồng hồ Lobinni LB19069BGT-DT Automatic với sự kết hợp hoàn hảo hài hòa về màu sắc vàng hồng tinh tế trên cả mặt và dây đồng hồ. Chất liệu thanh thoát bền bỉ giúp bạn nổi bật phong cách và tạo nét thu hút vô cùng thanh lịch.',

                'soluong' => 10,
                'id_loai' => 2
            ],
            //9
            [
                'ten' => 'Đồng hồ Hanboro HBR-1008 Automatic',
                'slug' => 'dong-ho-hanboro-hbr-1008-automatic',
                'anh' => 'sp9.jpg',
                'gia' => 10000000,
                'giaKM' => 9900000,
                'moTa' => 'Đồng hồ Hanboro HBR-1008 Automatic với sự kết hợp hoàn hảo hài hòa về màu sắc vàng hồng tinh tế trên cả mặt và dây đồng hồ. Chất liệu thanh thoát bền bỉ giúp bạn nổi bật phong cách và tạo nét thu hút vô cùng thanh lịch.',
                
                'soluong' => 10,
                'id_loai' => 2
            ],

        ]);
    }
}
