<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StudentTableData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = [
            [
                'full_name' => 'Triệu Thị Hồng Chát',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 1,
                'address' => '588 Calvin Street Baltimore, MD 21201',
                'birthday' => Carbon::parse('2000-08-19')
            ],
            [
                'full_name' => 'Hồ Thị Như Lộc',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 1,
                'address' => '483 Selah Way',
                'birthday' => Carbon::parse('1997-02-19')
            ],
            [
                'full_name' => 'Nghiêm Thị Bạch Dâu',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 1,
                'address' => '86 Despard Street',
                'birthday' => Carbon::parse('2002-12-06 ')
            ],
            [
                'full_name' => 'Dương Doãn Thái',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 1,
                'address' => '249 Elsie Drive',
                'birthday' => Carbon::parse('1997-11-10')
            ],
            [
                'full_name' => 'Vũ Thị Cúc Tốt',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 1,
                'address' => '3602 Margaret Street',
                'birthday' => Carbon::parse('1998-02-01')
            ],
            [
                'full_name' => 'Lưu Kiều Hà',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 1,
                'address' => '4159 Riverwood Drive',
                'birthday' => Carbon::parse('2001-12-08')
            ],
            [
                'full_name' => 'Dương Thanh Sáng',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 1,
                'address' => '4977 Ocello Street',
                'birthday' => Carbon::parse('2001-03-07 ')
            ],
            [
                'full_name' => 'Lương Hoàng Lanh',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 1,
                'address' => '1720 Hillcrest Drive ',
                'birthday' => Carbon::parse('1998-04-13')
            ],
            [
                'full_name' => 'Hồ Tấn Tin',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 1,
                'address' => '2786 Joy Lane',
                'birthday' => Carbon::parse('2000-07-29')
            ],
            [
                'full_name' => 'Trịnh Thị Ánh Xí',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 1,
                'address' => '176 Dennison Street',
                'birthday' => Carbon::parse('1997-11-08')
            ],
            [
                'full_name' => 'Bùi ﻿Văn Tuệ',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 2,
                'address' => '4704 College Street',
                'birthday' => Carbon::parse('1999-03-18')
            ],
            [
                'full_name' => 'Tạ Thị Túy Kiệm',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 2,
                'address' => '4327 Brown Avenue',
                'birthday' => Carbon::parse('1999-01-03')
            ],
            [
                'full_name' => 'Đoàn Quí Phiên',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 2,
                'address' => '2724 Jerry Dove Drive',
                'birthday' => Carbon::parse('2002-10-28')
            ],
            [
                'full_name' => 'Nguyễn Thị Diệu Ngân',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 2,
                'address' => '2062 Birch Street ',
                'birthday' => Carbon::parse('1998-12-09')
            ],
            [
                'full_name' => 'Phùng Hồng Phi',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 2,
                'address' => '384 Jadewood Drive',
                'birthday' => Carbon::parse('1997-09-10')
            ],
            [
                'full_name' => 'Kim Thị Xuân Tý',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 2,
                'address' => '',
                'birthday' => Carbon::parse('1998-03-10')
            ],
            [
                'full_name' => 'Thủy Lê Chấn',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 2,
                'address' => '1268 Roy Alley',
                'birthday' => Carbon::parse('1997-07-27')
            ],
            [
                'full_name' => 'Trần Vĩnh Hậu',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 2,
                'address' => '1073 Whitman Court',
                'birthday' => Carbon::parse('2000-08-22')
            ],
            [
                'full_name' => 'Võ Quảng Huấn',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 2,
                'address' => '4514 Bell Street',
                'birthday' => Carbon::parse('1997-08-22')
            ],
            [
                'full_name' => 'Mai Thị Thanh Lài',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 2,
                'address' => '1268 Pretty View Lane ',
                'birthday' => Carbon::parse('1999-05-01')
            ],
            [
                'full_name' => 'Chung Thành Quyết',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 3,
                'address' => '674 Hazelwood Avenue',
                'birthday' => Carbon::parse('1998-12-11')
            ],
            [
                'full_name' => 'Trần ﻿Thị Hương',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 3,
                'address' => '4134 Ottis Street',
                'birthday' => Carbon::parse('1997-04-29')
            ],
            [
                'full_name' => 'Đặng Thị Túy Hiền',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 3,
                'address' => '23 Bond Street',
                'birthday' => Carbon::parse('2001-10-25')
            ],
            [
                'full_name' => 'Dương Quang Tới',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 3,
                'address' => '390 Pursglove Court',
                'birthday' => Carbon::parse('')
            ],
            [
                'full_name' => 'Đỗ Kiều Sen',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 3,
                'address' => '314 Beechwood Avenue',
                'birthday' => Carbon::parse('2000-10-11')
            ],
            [
                'full_name' => 'Lý Nguyên Chua',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 3,
                'address' => '004 Deer Ridge Drive ',
                'birthday' => Carbon::parse('1997-08-18')
            ],
            [
                'full_name' => 'Nghiêm Thị Xuân Hát',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 3,
                'address' => 'Arlington Heights, IL 60005',
                'birthday' => Carbon::parse('2002-07-07 ')
            ],
            [
                'full_name' => 'Đinh Tiến Thạch',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 3,
                'address' => '3750 Railroad Street',
                'birthday' => Carbon::parse('2000-08-11')
            ],
            [
                'full_name' => 'Hàn Thị Mai Trị',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 3,
                'address' => '1227 Elk Creek Road',
                'birthday' => Carbon::parse('1999-12-17')
            ],
            [
                'full_name' => 'Chu Thị Như Em',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 3,
                'address' => '2379 Oak Avenue',
                'birthday' => Carbon::parse('1997-12-19')
            ],
            [
                'full_name' => 'Lưu Thị Liên Đoan',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 4,
                'address' => '4902 Cherry Camp Road',
                'birthday' => Carbon::parse('2002-05-05')
            ],
            [
                'full_name' => 'Hồ Vĩnh Lam',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 4,
                'address' => '584 Hill Haven Drive',
                'birthday' => Carbon::parse(' 2002-06-20')
            ],
            [
                'full_name' => 'Hồ Thị Thu Hạnh',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 4,
                'address' => '2484 Kyle Street',
                'birthday' => Carbon::parse('2002-09-23')
            ],
            [
                'full_name' => 'Trần Thị Cúc Đoan',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 4,
                'address' => '878 Riverwood Drive',
                'birthday' => Carbon::parse('1999-02-09')
            ],
            [
                'full_name' => 'Thạch Cẩm Hằng',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 4,
                'address' => '252 Chestnut Street',
                'birthday' => Carbon::parse('2001-05-28')
            ],
            [
                'full_name' => 'Đào Cẩm Kim',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 4,
                'address' => '75 Godfrey Street',
                'birthday' => Carbon::parse('2000-02-20')
            ],
            [
                'full_name' => 'Chung Quang Nghĩa',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 4,
                'address' => '568 Matthews Street',
                'birthday' => Carbon::parse('2001-12-10')
            ],
            [
                'full_name' => 'Vương Trường Tiền',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 4,
                'address' => '932 Losh Lane',
                'birthday' => Carbon::parse('1998-06-21')
            ],
            [
                'full_name' => 'Hồ Thị Phương Tư',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 4,
                'address' => '20 Jarvis Street',
                'birthday' => Carbon::parse('2002-11-04')
            ],
            [
                'full_name' => 'Chung Công Hân',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 4,
                'address' => '83 Hog Camp Road',
                'birthday' => Carbon::parse('2002-06-29')
            ],
            [
                'full_name' => 'Phan Kim Tiếp',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 5,
                'address' => '1953 Peck Cour',
                'birthday' => Carbon::parse('1999-10-07')
            ],
            [
                'full_name' => 'Dương Quí Sáng',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 5,
                'address' => '246 Rocky Road',
                'birthday' => Carbon::parse('1999-10-27')
            ],
            [
                'full_name' => 'Văn Sĩ Chức',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 5,
                'address' => '86 Stonepot Road',
                'birthday' => Carbon::parse('2002-02-18')
            ],
            [
                'full_name' => 'Đỗ Ngọc Ngà',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 5,
                'address' => '2 Lodgeville Road',
                'birthday' => Carbon::parse('2002-02-24')
            ],
            [
                'full_name' => 'Trịnh Quỳnh Quyên',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 5,
                'address' => '12 Hart Country Lane',
                'birthday' => Carbon::parse('1996-11-14')
            ],
            [
                'full_name' => 'Trịnh Duy Lam',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 5,
                'address' => '998 State Street',
                'birthday' => Carbon::parse('2001-04-04')
            ],
            [
                'full_name' => 'Lạc Thị Túy Tâm',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 5,
                'address' => '3525 Oakmound Road',
                'birthday' => Carbon::parse('1998-02-25')
            ],
            [
                'full_name' => 'Phạm Công Thứ',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 5,
                'address' => '856 Bottom Lane',
                'birthday' => Carbon::parse('1998-01-24')
            ],
            [
                'full_name' => 'Bùi Doãn Thơ',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 5,
                'address' => '94 Coplin Avenue',
                'birthday' => Carbon::parse('2000-02-17')
            ],
            [
                'full_name' => 'Vũ Thị Phương Tương',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 5,
                'address' => '773 Retreat Avenue',
                'birthday' => Carbon::parse('2002-10-08')
            ],
            [
                'full_name' => 'Đoàn Thị Ngọc Như',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 6,
                'address' => '043 Hart Country Lane',
                'birthday' => Carbon::parse('1998-06-19')
            ],
            [
                'full_name' => 'Lâm Quảng Khuê',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 6,
                'address' => '4545 Valley Street',
                'birthday' => Carbon::parse('2001-09-10')
            ],
            [
                'full_name' => 'Phùng Quốc Thao',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 6,
                'address' => '3022 Sugarfoot Lane',
                'birthday' => Carbon::parse('1998-08-15')
            ],
            [
                'full_name' => 'Thủy Thị Hoàng Sen',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 6,
                'address' => '317 Fraggle Drive',
                'birthday' => Carbon::parse('2001-08-30')
            ],
            [
                'full_name' => 'Phạm Phương Anh',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 6,
                'address' => '133 Catherine Drive',
                'birthday' => Carbon::parse('1998-11-08')
            ],
            [
                'full_name' => 'Lương Hữu Thế',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 6,
                'address' => '476 Timber Ridge Road',
                'birthday' => Carbon::parse('1998-11-09')
            ],
            [
                'full_name' => 'Hồ Thị Ái Nguyệt',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 6,
                'address' => '479 Pheasant Ridge Road',
                'birthday' => Carbon::parse(' 1999-02-21')
            ],
            [
                'full_name' => 'Huỳnh Thị Ánh Xứng',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 6,
                'address' => 'herman Oaks, CA 91403',
                'birthday' => Carbon::parse('1998-09-15')
            ],
            [
                'full_name' => 'Chu Hà Hội',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 6,
                'address' => '826 Locust View Drive',
                'birthday' => Carbon::parse('1998-09-12')
            ],
            [
                'full_name' => 'Trịnh Thị Kiều Thê',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 6,
                'address' => '75 Reeves Street',
                'birthday' => Carbon::parse('1997-02-23')
            ],
            [
                'full_name' => 'Quynh Viêt Cam',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 7,
                'address' => '882 Cedarstone Drive',
                'birthday' => Carbon::parse('1997-02-10')
            ],
            [
                'full_name' => 'Trần Thị Lệ Cầu',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 7,
                'address' => '5 Hazelwood Avenue',
                'birthday' => Carbon::parse('1998-05-18')
            ],
            [
                'full_name' => 'Hoàng Hà Nhiên',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 7,
                'address' => '519 Hillcrest Avenue',
                'birthday' => Carbon::parse('1999-02-22')
            ],
            [
                'full_name' => 'Thủy Viêt Luân',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 7,
                'address' => '566 Hamill Avenue',
                'birthday' => Carbon::parse('1999-07-16')
            ],
            [
                'full_name' => 'Đỗ Thị Xuân Huyền',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 7,
                'address' => '604 Foley Street',
                'birthday' => Carbon::parse('2000-11-12')
            ],
            [
                'full_name' => 'Hà Thị Ai Bội',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 7,
                'address' => '446 Benson Park Drive',
                'birthday' => Carbon::parse('2001-12-11')
            ],
            [
                'full_name' => 'Trần Thị Bạch Xinh',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 7,
                'address' => '274 Woodstock Drive',
                'birthday' => Carbon::parse('1998-04-20')
            ],
            [
                'full_name' => 'Đoàn Lê Trọng',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 7,
                'address' => '506 Devils Hill Road',
                'birthday' => Carbon::parse('1999-02-13')
            ],
            [
                'full_name' => 'Cao Thị Tuyết My',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 7,
                'address' => '4084 Centennial Farm Road',
                'birthday' => Carbon::parse('1998-06-02')
            ],
            [
                'full_name' => 'Tạ Doãn Tư',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 7,
                'address' => '109 Shobe Lane',
                'birthday' => Carbon::parse('1997-07-02')
            ],
            [
                'full_name' => 'Thạch Thị Kim Hương',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 8,
                'address' => '1 Elm Drive',
                'birthday' => Carbon::parse('2002-08-06')
            ],
            [
                'full_name' => 'Hàn Hải Mừng',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 8,
                'address' => '',
                'birthday' => Carbon::parse('1998-09-12')
            ],
            [
                'full_name' => 'Mai Kiên Trí',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 8,
                'address' => '860 Pickens Way',
                'birthday' => Carbon::parse('2001-02-05')
            ],
            [
                'full_name' => 'Lương Tất Tuyến',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 8,
                'address' => '793 Christie Way',
                'birthday' => Carbon::parse('2001-01-15')
            ],
            [
                'full_name' => 'Bùi Thị Tuyết Chanh',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 8,
                'address' => '133 Catherine Drive',
                'birthday' => Carbon::parse('1999-05-19')
            ],
            [
                'full_name' => 'Thủy Quảng Mẫn',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 8,
                'address' => '756 College Street',
                'birthday' => Carbon::parse('1999-02-12')
            ],
            [
                'full_name' => 'Trịnh Phương Lời',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 8,
                'address' => '780 Francis Mine',
                'birthday' => Carbon::parse('2001-10-12')
            ],
            [
                'full_name' => 'Lưu Thị Diệu Huê',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 8,
                'address' => '',
                'birthday' => Carbon::parse('1997-12-02')
            ],
            [
                'full_name' => 'Hà Thị Quỳnh Thạnh',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 8,
                'address' => '12 Rosewood Lane',
                'birthday' => Carbon::parse('1999-03-05')
            ],
            [
                'full_name' => 'Vũ Khắc Tứ',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 8,
                'address' => '71 Abner Road',
                'birthday' => Carbon::parse('2001-07-07')
            ],
            [
                'full_name' => 'Lý Ngọc Đạm',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 9,
                'address' => '405 Boring Lane',
                'birthday' => Carbon::parse('2001-08-07')
            ],
            [
                'full_name' => 'Lý Kim Miên',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 9,
                'address' => '67 State Street',
                'birthday' => Carbon::parse('1998-10-24')
            ],
            [
                'full_name' => 'Luong Thi Nhâm',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 9,
                'address' => '926 Irish Lane',
                'birthday' => Carbon::parse('1999-10-05')
            ],
            [
                'full_name' => 'Hồ Thị Linh Chín',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 9,
                'address' => '263 Berry Street',
                'birthday' => Carbon::parse('1999-08-15')
            ],
            [
                'full_name' => 'Chung Hưng Toán',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 9,
                'address' => '535 Duke Lane',
                'birthday' => Carbon::parse('1997-12-24')
            ],
            [
                'full_name' => 'Nguyễn Thị Thu Xê',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 9,
                'address' => '887 Flinderation Road',
                'birthday' => Carbon::parse('2002-01-11')
            ],
            [
                'full_name' => 'Huỳnh Hồng Lam',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 0,
                'class_id' => 9,
                'address' => '12 Jacobs Street',
                'birthday' => Carbon::parse('1997-09-15')
            ],
            [
                'full_name' => 'Hàn Cao Điểu',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 9,
                'address' => '926 Irish Lane',
                'birthday' => Carbon::parse('1997-06-05')
            ],
            [
                'full_name' => 'Chung Doãn Toản',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 9,
                'address' => '786 Daven Port, Iowa',
                'birthday' => Carbon::parse('2001-05-23')
            ],
            [
                'full_name' => 'Ngô Quốc Việt',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 9,
                'address' => '780 Francis Mine',
                'birthday' => Carbon::parse('1997-06-23')
            ],
            [
                'full_name' => 'Cao Quốc Chánh',
                'email' => str_random(10) . '@gmail.com',
                'gender' => 1,
                'class_id' => 9,
                'address' => '6 College Street',
                'birthday' => Carbon::parse('1999-07-13')
            ],
        ];
        DB::table('students')->insert($student);

    }
}
