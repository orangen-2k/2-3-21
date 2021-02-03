<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('theloai')->insert([
            ['id'=>1,'ten'=>'Khoa học', 'tenkhongdau'=>'Khoa-hoc'],
            ['id'=>2,'ten'=>'Kỹ thuật', 'tenkhongdau'=>'Ky-thuat'],
            ['id'=>3,'ten'=>'Chính trị', 'tenkhongdau'=>'Chinh-tri'],
            ['id'=>4,'ten'=>'Pháp luật', 'tenkhongdau'=>'Phap-luat'],
            ['id'=>5,'ten'=>'Công nghệ', 'tenkhongdau'=>'Cong-nghe'],
            ['id'=>6,'ten'=>'Xã hội', 'tenkhongdau'=>'Xa-hoi'],
            ['id'=>7,'ten'=>'Cộng đồng', 'tenkhongdau'=>'Cong-dong'],
            ['id'=>8,'ten'=>'Học tập', 'tenkhongdau'=>'Hoc-tap'],
        ]);
        DB::table('loaitin')->insert([
            ['id'=>1,'idtheloai'=>'1', 'ten'=>'Thí nghiệm', 'tenkhongdau'=>'th-nghiem', 'id_theloai'=>'1'],
            ['id'=>2,'idtheloai'=>'2', 'ten'=>'Chế tạo', 'tenkhongdau'=>'che-tao', 'id_theloai'=>'2'],
            ['id'=>3,'idtheloai'=>'2', 'ten'=>'Cổng đồng', 'tenkhongdau'=>'c-ng-ng', 'id_theloai'=>'2'],
            ['id'=>4,'idtheloai'=>'1', 'ten'=>'Sáng tạo', 'tenkhongdau'=>'sang-tao', 'id_theloai'=>'1'],
            ['id'=>5,'idtheloai'=>'3', 'ten'=>'Họp tổng bộ', 'tenkhongdau'=>'hop-t-ng-b-', 'id_theloai'=>'3'],
            ['id'=>6,'idtheloai'=>'4', 'ten'=>'Bỏ phiếu', 'tenkhongdau'=>'bo-phieu', 'id_theloai'=>'4'],
            ['id'=>7,'idtheloai'=>'3', 'ten'=>'Dân chủ', 'tenkhongdau'=>'dan-chu', 'id_theloai'=>'3'],
            ['id'=>8,'idtheloai'=>'5', 'ten'=>'Họp tổng bộ chi', 'tenkhongdau'=>'hop-t-ng-b-chi', 'id_theloai'=>'5'],
            ['id'=>9,'idtheloai'=>'3', 'ten'=>'Phong cảnh', 'tenkhongdau'=>'phong-canh', 'id_theloai'=>'3'],
            ['id'=>10,'idtheloai'=>'4', 'ten'=>'Kỹ thuật', 'tenkhongdau'=>'ky-thuat', 'id_theloai'=>'4'],
        ]);
        DB::table('tintuc')->insert([
            ['id'=>1,'tieude'=>'Hôm nay ăn cái gì ??', 'tieudekhongdau'=>'h-m-nay-an-cai-g-', 'tomtat'=>'Đi học1',
                'noidung'=>'Đi học Đi học',
                'hinh'=>'oToIj_Screenshot from 2021-01-25 16-53-51.png', 'noibat'=>'1', 'soluotxem'=>'0',
                'idloaitin'=>'3', 'loaitin_id'=>'3'],
            ['id'=>2,'tieude'=>'Hôm nay ăn gì lo ??', 'tieudekhongdau'=>'h-m-nay-an-g-lo-', 'tomtat'=>'Đi học1',
                'noidung'=>'Đi học Đi học', 'hinh'=>'u8BEY_Screenshot from 2021-01-26 14-29-27.png',
                'noibat'=>'1', 'soluotxem'=>'0', 'idloaitin'=>'2', 'loaitin_id'=>'2'],
            ['id'=>3,'tieude'=>'Hôm nay ăn gì ta ??', 'tieudekhongdau'=>'h-m-nay-an-g-ta-', 'tomtat'=>'HT5',
                'noidung'=>'Đi học5', 'hinh'=>'KEBJ0_1.png',
                'noibat'=>'1', 'soluotxem'=>'0', 'idloaitin'=>'1', 'loaitin_id'=>' 1'],
            ['id'=>4,'tieude'=>'Hôm nay ăn gì ta ??', 'tieudekhongdau'=>'h-m-nay-an-g-ta-', 'tomtat'=>'ạo giống mới cho nông',
                'noidung'=>'tạo giống mới cho nông nghiệp phát triển', 'hinh'=>'yCP4F_Screenshot from 2021-01-25 16-54-54.png',
                'noibat'=>'1', 'soluotxem'=>'0', 'idloaitin'=>'5', 'loaitin_id'=>'5'],
            ['id'=>5,'tieude'=>'Hiển thị10', 'tieudekhongdau'=>'hien-th-10', 'tomtat'=>'Đã thành công tạo giống mới',
                'noidung'=>'Đã thành công tạo giống mới cho nông nghiệp phát triển', 'hinh'=>'WKp5I_49341998_2125369931107394_3336962123229036544_n.jpg',
                'noibat'=>'1', 'soluotxem'=>'0', 'idloaitin'=>'1', 'loaitin_id'=>'1'],
            ['id'=>6,'tieude'=>'Hiển thị3', 'tieudekhongdau'=>'hien-th-3', 'tomtat'=>'HT3',
                'noidung'=>'Đi học3', 'hinh'=>'EJUOS_Screenshot from 2021-01-25 16-54-54.png',
                'noibat'=>'1', 'soluotxem'=>'0', 'idloaitin'=>'3', 'loaitin_id'=>'3'],
            ['id'=>7,'tieude'=>'nghiệp phát triển ngông', 'tieudekhongdau'=>'nghiep-phat-trien-ng-ng', 'tomtat'=>'nghiệp phát triển ngông',
                'noidung'=>'Đi nghiệp phát triển ngông', 'hinh'=>'blbxq_Screenshot from 2021-01-21 16-09-21.png',
                'noibat'=>'1', 'soluotxem'=>'0', 'idloaitin'=>'4', 'loaitin_id'=>'4'],
            ['id'=>8,'tieude'=>'Phát triển', 'tieudekhongdau'=>'phat-trien', 'tomtat'=>'phát Đi học1',
                'noidung'=>'Đi học', 'hinh'=>'6PSY5_Screenshot from 2021-01-21 16-41-52.png',
                'noibat'=>'1', 'soluotxem'=>'0', 'idloaitin'=>'1', 'loaitin_id'=>'1'],
            ['id'=>9,'tieude'=>'triển ngông', 'tieudekhongdau'=>'phat-trien', 'tomtat'=>'nghiệp phát triển ngông',
                'noidung'=>'nghiệp phát triển', 'hinh'=>'S87oo_Screenshot from 2021-01-22 16-00-41.png',
                'noibat'=>'1', 'soluotxem'=>'0', 'idloaitin'=>'2', 'loaitin_id'=>'2'],
            ['id'=>10,'tieude'=>'Phát triển', 'tieudekhongdau'=>'trien-ng-ng', 'tomtat'=>'nghiệp phát triển ngông',
                'noidung'=>'nghiệp phát triển ngông', 'hinh'=>'SEui6_Screenshot from 2021-01-26 15-27-00.png',
                'noibat'=>'2', 'soluotxem'=>'0', 'idloaitin'=>'4', 'loaitin_id'=>'4'],
        ]);
        DB::table('comment')->insert([
            ['id'=>1,'iduser'=>'1', 'idtintuc'=>'1', 'noidung'=>'Hay', 'tintuc_id'=>'1'],
            ['id'=>2,'iduser'=>'1', 'idtintuc'=>'1', 'noidung'=>'Hay', 'tintuc_id'=>'1'],
            ['id'=>3,'iduser'=>'1', 'idtintuc'=>'1', 'noidung'=>'Hay', 'tintuc_id'=>'1'],
            ['id'=>4,'iduser'=>'1', 'idtintuc'=>'1', 'noidung'=>'Hay', 'tintuc_id'=>'1'],
            ['id'=>5,'iduser'=>'1', 'idtintuc'=>'1', 'noidung'=>'Hay', 'tintuc_id'=>'1'],
            ['id'=>6,'iduser'=>'1', 'idtintuc'=>'1', 'noidung'=>'Hay', 'tintuc_id'=>'1'],
            ['id'=>7,'iduser'=>'1', 'idtintuc'=>'1', 'noidung'=>'Hay', 'tintuc_id'=>'1'],
        ]);
        DB::table('slide')->insert([
            ['id'=>1,'ten'=>'1', 'hinh'=>'sl.png', 'noidung'=>'Hay1', 'link'=>'11'],
            ['id'=>2,'ten'=>'12', 'hinh'=>'sl2.jpg', 'noidung'=>'Hay2', 'link'=>'12'],
            ['id'=>3,'ten'=>'13', 'hinh'=>'sl3.jpg', 'noidung'=>'Hay3', 'link'=>'13'],
        ]);
        DB::table('users')->insert([
            ['id'=>1,'name'=>'chien', 'email'=>'chien@gmail.com', 'password'=>bcrypt('chien@123ne'),
                'number'=>'0963328520', 'level'=>'1', 'comment_id'=>'1'],
            ['id'=>2,'name'=>'chien2', 'email'=>'chien2@gmail.com', 'password'=>bcrypt('chien@123ne'), 'number'=>'0963328520'
                , 'level'=>'2', 'comment_id'=>'1'],
            ['id'=>3,'name'=>'chien', 'email'=>'chien1@gmail.com', 'password'=>bcrypt('123'), 'number'=>'0963328520'
                , 'level'=>'1', 'comment_id'=>'1'],
            ['id'=>4,'name'=>'chien2', 'email'=>'chien12@gmail.com', 'password'=>bcrypt('123'), 'number'=>'0963328520'
                , 'level'=>'2', 'comment_id'=>'1'],
            ['id'=>5,'name'=>'chien', 'email'=>'chien222@gmail.com', 'password'=>bcrypt('123'), 'number'=>'0963328520'
                , 'level'=>'1', 'comment_id'=>'1'],
            ['id'=>6,'name'=>'chien2', 'email'=>'chien22@gmail.com', 'password'=>bcrypt('123'), 'number'=>'0963328520'
                , 'level'=>'2', 'comment_id'=>'1'],
            ['id'=>7,'name'=>'chien', 'email'=>'chien3@gmail.com', 'password'=>bcrypt('123'), 'number'=>'0963328520'
                , 'level'=>'1', 'comment_id'=>'1'],
            ['id'=>8,'name'=>'chien2', 'email'=>'chien32@gmail.com', 'password'=>bcrypt('123'), 'number'=>'0963328520'
                , 'level'=>'2', 'comment_id'=>'1'],
            ['id'=>9,'name'=>'chien', 'email'=>'chien4@gmail.com', 'password'=>bcrypt('123'), 'number'=>'0963328520'
                , 'level'=>'1', 'comment_id'=>'1'],
            ['id'=>10,'name'=>'chien2', 'email'=>'chien42@gmail.com', 'password'=>bcrypt('123'), 'number'=>'0963328520'
                , 'level'=>'2', 'comment_id'=>'1'],
            ['id'=>11,'name'=>'chien', 'email'=>'chien5@gmail.com', 'password'=>bcrypt('123'), 'number'=>'0963328520'
                , 'level'=>'1', 'comment_id'=>'1'],
            ['id'=>12,'name'=>'chien2', 'email'=>'chien52@gmail.com', 'password'=>bcrypt('123'), 'number'=>'0963328520'
                , 'level'=>'2', 'comment_id'=>'1'],
            ['id'=>13,'name'=>'chien', 'email'=>'chien6@gmail.com', 'password'=>bcrypt('123'), 'number'=>'0963328520'
                , 'level'=>'1', 'comment_id'=>'1'],
            ['id'=>14,'name'=>'chien2', 'email'=>'chien62@gmail.com', 'password'=>bcrypt('123'), 'number'=>'0963328520'
                , 'level'=>'2', 'comment_id'=>'1'],
            ['id'=>15,'name'=>'chien', 'email'=>'chien7@gmail.com', 'password'=>bcrypt('123'), 'number'=>'0963328520'
                , 'level'=>'1', 'comment_id'=>'1'],
            ['id'=>16,'name'=>'chien2', 'email'=>'chien72@gmail.com', 'password'=>bcrypt('123'), 'number'=>'0963328520'
                , 'level'=>'2', 'comment_id'=>'1'],
            ['id'=>17,'name'=>'chien', 'email'=>'chien8@gmail.com', 'password'=>bcrypt('123'), 'number'=>'0963328520'
                , 'level'=>'1', 'comment_id'=>'1'],
            ['id'=>18,'name'=>'chien2', 'email'=>'chien82@gmail.com', 'password'=>bcrypt('123'), 'number'=>'0963328520'
                , 'level'=>'2', 'comment_id'=>'1'],
        ]);
    }
}
