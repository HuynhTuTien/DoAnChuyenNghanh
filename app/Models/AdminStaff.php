<?php


namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class AdminStaff extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'admin_staff';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'password',
        'role',
        'active',
        'ngay_sinh',
        'can_cuoc',
        'que_quan',
        'chuc_vu'
    ];

    // Phương thức cần thiết khi sử dụng Authenticatable
    public $timestamps = false;

    /**
     * Lấy giá trị của khóa chính của đối tượng (ID)
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Lấy giá trị khóa chính của đối tượng
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Lấy giá trị mật khẩu của đối tượng
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Lấy giá trị của token xác thực (nếu có)
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Cập nhật token xác thực (nếu có)
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Lấy tên của trường lưu trữ token xác thực (nếu có)
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Lấy tên của trường mật khẩu (điều này có thể là lý do gây lỗi)
     */
    public function getAuthPasswordName()
    {
        return 'password';
    }

    /**
     * Lọc nhân viên từ bảng admin_staff với vai trò 'staff'
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function getStaff()
    {
        return self::where('role', 'staff')->get();
    }

    /**
     * Lọc quản trị viên từ bảng admin_staff với vai trò 'admin'
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function getAdmin()
    {
        return self::where('role', 'admin')->get();
    }

    /**
     * Tạo nhân viên mới với vai trò 'staff', chỉ admin mới có quyền này
     * @param array $data
     * @return AdminStaff
     */
    public static function createStaff(array $data)
    {
        // Đảm bảo rằng role của người dùng tạo là 'staff'
        $data['role'] = 'staff';
        $data['password'] = Hash::make($data['password']);
        $data['active'] = 'active';

        return self::create($data);
    }

    /**
     * Cập nhật thông tin nhân viên
     * Nếu có mật khẩu mới, mã hóa mật khẩu đó
     * @param array $data
     * @return AdminStaff
     */
    public function updateStaff(array $data): bool
    {
        // Nếu không có mật khẩu mới, giữ mật khẩu cũ
        if (isset($data['password']) && $data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']); // Không cập nhật mật khẩu nếu trống
        }

        // Cập nhật thông tin nhân viên hoặc admin
        return $this->update($data);
    }
}
