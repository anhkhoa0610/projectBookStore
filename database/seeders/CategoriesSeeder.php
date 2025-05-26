<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $the_loai = [
            "Thiếu nhi",
            "Phiêu lưu",
            "Tiểu thuyết chiến tranh",
            "Tâm lý",
            "Tiểu thuyết trào phúng",
            "Xã hội",
            "Thơ",
            "Truyện thơ",
            "Tự lực",
            "Tiểu thuyết",
            "Tuổi thơ",
            "Tập truyện ngắn",
            "Văn hóa",
            "Hồi ký",
            "Kỹ năng sống",
            "Truyền cảm hứng",
            "Phát triển bản thân",
            "Giáo dục",
            "Tản văn",
            "Kỹ năng học tập",
            "Truyện tranh",
            "Lịch sử",
            "Quân sự"
        ];

        $mo_ta = [
            "Sách dành cho trẻ em với nội dung đơn giản, sinh động.",
            "Khám phá, hành trình mạo hiểm, những chuyến đi kỳ thú.",
            "Tái hiện chiến tranh qua lăng kính tiểu thuyết.",
            "Phân tích tâm lý nhân vật, cảm xúc và hành vi con người.",
            "Châm biếm, hài hước thông qua câu chuyện tiểu thuyết.",
            "Phản ánh hiện thực xã hội và các vấn đề cộng đồng.",
            "Tác phẩm thơ ca, ngắn gọn, giàu hình ảnh và cảm xúc.",
            "Truyện kể dưới hình thức thơ, vần điệu.",
            "Tác phẩm khuyến khích tinh thần tự lập, tự rèn luyện.",
            "Thể loại văn học hư cấu, cốt truyện phong phú.",
            "Nội dung gợi nhớ, phản ánh tuổi thơ hồn nhiên.",
            "Tập hợp các truyện ngắn với chủ đề đa dạng.",
            "Tìm hiểu các giá trị, phong tục và đời sống văn hóa.",
            "Kể lại cuộc đời thật của một người, thường mang tính cá nhân.",
            "Cung cấp kiến thức, thói quen giúp phát triển kỹ năng sống.",
            "Tạo động lực, truyền cảm hứng trong cuộc sống và công việc.",
            "Giúp người đọc phát triển bản thân, nâng cao tư duy.",
            "Chia sẻ tri thức, kỹ năng trong giáo dục và học tập.",
            "Bài viết ngắn, nhẹ nhàng, mang tính suy ngẫm.",
            "Chiến lược, cách học hiệu quả, phát triển bản thân trong học tập.",
            "Truyện bằng tranh, hấp dẫn cho cả trẻ em và người lớn.",
            "Khám phá lịch sử, nhân vật và sự kiện đã qua.",
            "Tác phẩm về chiến tranh, quân đội và chiến lược quân sự."
        ];
        

        for ($i = 0; $i < count($the_loai); $i++) {
            DB::table('categories')->insert([
                'category_name' => $the_loai[$i],
                'category_desc' => $mo_ta[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
