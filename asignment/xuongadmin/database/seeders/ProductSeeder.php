<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("products")->insert([
            [
                'name' => 'Citizen BI5006-81P Quartz',
                'slug' => 'citizen-bi5006-81p-quartz',
                'image' => 'sp1.jpg',
                'price' => 30000000,
                'sale_price' => 29000000,
                'description' => 'Đồng hồ Citizen BI5006-81P Quartz là một trong những mẫu đồng hồ nam Citizen chính hãng được ưa chuộng nhất hiện nay. Với thiết kế mạnh mẽ, nam tính, mặt số tròn lớn, dây đeo kim loại chắc chắn, đồng hồ Citizen BI5006-81P Quartz sẽ là một lựa chọn hoàn hảo cho các quý ông.',
                'quantity' => 10,
                'category_id' => 1
            ],
            //2
            [
                'name' => 'Đồng Hồ Đeo Tay Nam Cao Cấp KIMSOUN',
                'slug' => 'dong-ho-deo-tay-nam-cao-cap-kimsoun',
                'image' => 'sp2.webp',
                'price' => 5000000,
                'price_sale' => 4900000,
                'description' => 'Đồng hồ nam Casio MTP-1374D-7AVDF là một trong những mẫu đồng hồ nam Casio chính hãng được ưa chuộng nhất hiện nay. Với thiết kế mạnh mẽ, nam tính, mặt số tròn lớn, dây đeo kim loại chắc chắn, đồng hồ nam Casio MTP-1374D-7AVDF sẽ là một lựa chọn hoàn hảo cho các quý ông.',
                'quantity' => 10,
                'category_id' => 2
            ],
            //3
            [
                'name' => 'Maserati Potenza Skeleton Dial Black Leather',
                'slug' => 'maserati-potenza-skeleton-dial-black-leather',
                'image' => 'sp3.webp',
                'price' => 10000000,
                'price_sale' => 9900000,
                'description' => 'Đồng hồ Maserati Potenza Skeleton Dial Black Leather là một trong những mẫu đồng hồ nam Maserati chính hãng được ưa chuộng nhất hiện nay. Với thiết kế mạnh mẽ, nam tính, mặt số tròn lớn, dây đeo kim loại chắc chắn, đồng hồ Maserati Potenza R8871621001 sẽ là một lựa chọn hoàn hảo cho các quý ông.',

                'quantity' => 10,
                'category_id' => 3
            ],
            //4
            [
                'name' => 'Classic Petite Unitone Rose Gold',
                'slug' => 'classic-petite-unitone-rose-gold',
                'image' => 'sp4.jpg',
                'price' => 10000000,
                'price_sale' => 9900000,
                'description' => 'Classic Petite Unitone Rose Gold với sự kết hợp hoàn hảo hài hòa về màu sắc vàng hồng tinh tế trên cả mặt và dây đồng hồ. Chất liệu thanh thoát bền bỉ giúp bạn nổi bật phong cách và tạo nét thu hút vô cùng thanh lịch.',

                'quantity' => 10,
                'category_id' => 3
            ],
            //5
            [
                'name' => 'Neos N-30855M Dây Thép Vàng',
                'slug' => 'neos-n-30855m-day-thep-vang',
                'image' => 'sp5.webp',
                'price' => 10000000,
                'price_sale' => 9900000,
                'description' => 'Đồng hồ nam chính hãng Neos N-30855M dây thép vàng là tuyệt tác sản phẩm cao cấp của thương hiệu đồng hồ Neos Thụy Sĩ. Với kinh nghiệm của ngành chế tác đồng hồ và là cái nôi của ngành đồng hồ thế giới Thụy Sĩ là quốc gia của ngành chế tác đồng hồ danh tiếng thế giới hàng trăm năm qua.',

                'quantity' => 10,
                'category_id' => 3
            ],
            //6
            [
                'name' => 'Đồng Hồ Nam Citizen AN8201-57L',
                'slug' => 'dong-ho-nam-citizen-an8201-57l',
                'image' => 'sp6.jpg',
                'price' => 10000000,
                'price_sale' => 9900000,
                'description' => 'Đồng Hồ Nam Citizen AN8201-57L với sự kết hợp hoàn hảo hài hòa về màu sắc vàng hồng tinh tế trên cả mặt và dây đồng hồ. Chất liệu thanh thoát bền bỉ giúp bạn nổi bật phong cách và tạo nét thu hút vô cùng thanh lịch.',

                'quantity' => 10,
                'category_id' => 1
            ],
            //7
            [
                'name' => 'Fossil Heritage ME3226 Automatic',
                'slug' => 'fossil-heritage-me3226-automatic',
                'image' => 'sp7.webp',
                'price' => 10000000,
                'price_sale' => 9900000,
                'description' => 'Fossil Heritage ME3226, chiếc đồng hồ cổ điển mạ vàng PVD cực sang trọng và đẳng cấp dành cho mọi quý ông. Sử dụng bộ máy cơ Nhật Bản cho chất lượng tuyệt vời, vận hành êm ái.',

                'quantity' => 10,
                'category_id' => 1
            ],
            //8
            [
                'name' => 'Đồng hồ Lobinni LB19069BGT-DT Automatic',
                'slug' => 'dong-ho-lobinni-lb19069bgt-dt-automatic',
                'image' => 'sp8.jpg',
                'price' => 10000000,
                'price_sale' => 9900000,
                'description' => 'Đồng hồ Lobinni LB19069BGT-DT Automatic với sự kết hợp hoàn hảo hài hòa về màu sắc vàng hồng tinh tế trên cả mặt và dây đồng hồ. Chất liệu thanh thoát bền bỉ giúp bạn nổi bật phong cách và tạo nét thu hút vô cùng thanh lịch.',

                'quantity' => 10,
                'category_id' => 2
            ],
            //9
            [
                'name' => 'Đồng hồ Hanboro HBR-1008 Automatic',
                'slug' => 'dong-ho-hanboro-hbr-1008-automatic',
                'image' => 'sp9.jpg',
                'price' => 10000000,
                'price_sale' => 9900000,
                'description' => 'Đồng hồ Hanboro HBR-1008 Automatic với sự kết hợp hoàn hảo hài hòa về màu sắc vàng hồng tinh tế trên cả mặt và dây đồng hồ. Chất liệu thanh thoát bền bỉ giúp bạn nổi bật phong cách và tạo nét thu hút vô cùng thanh lịch.',

                'quantity' => 10,
                'category_id' => 2
            ],
        ]);
    }
}
