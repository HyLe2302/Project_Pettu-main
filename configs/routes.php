<?php
$routes['default_controller'] = 'authcontroller';
// Đường dẫn ảo -> đường dẫn thật
$routes['tin-tuc/.+-(\d+).html'] = 'news/category/$1';

// Định tuyến API
$routes['api/login'] = 'auth/login'; // API đăng nhập
$routes['api/register'] = 'auth/register'; // API đăng ký
$routes['api/logout'] = 'auth/logout'; // API đăng xuất


// Admin API
$routes['api/pets/detailInfo'] = 'admin/home/getPetDetailInfo'; // API thông tin chi tiết của Pets
$routes['api/services/detailInfo'] = 'admin/service/getServiceDetailInfo'; // API thông tin chi tiết của Services
$routes['api/services/getTimeWorking'] = 'admin/service/getTimeWorking'; // API thông tin chi tiết của Services
$routes['api/expert_team/detailInfo'] = 'admin/expertteam/getExpertTeamInfo'; // API lấy thông tin đội ngũ chuyên gia
$routes['api/expert_team/detailWithPosition'] = 'admin/expertteam/getExpertTeamInService'; // API lấy thông tin đội ngũ chuyên gia theo từng chức vụ
$routes['api/blogs/listBlog'] = 'admin/blog/getListBlog'; // API lấy danh sách blog theo danh mục

// Admin API in Dashboard Admin Page
$routes['api/dashboard/listUser'] = 'admin/dashboard/user/getListUser'; // API lấy danh sách người dùng - AdminPage
$routes['api/dashboard/listCompetentPersonnel'] = 'admin/dashboard/user/getListCompetentPersonnel'; // API lấy danh sách nhân sự - AdminPage
$routes['api/dashboard/updateStatusAccount'] = 'admin/dashboard/user/updateStatusAccount'; // API update trạng thái đăng nhập - AdminPage
$routes['api/dashboard/confirmRegisterService'] = 'admin/dashboard/user/confirmRegisterService'; // API duyệt trạng thái đăng ký dịch vụ - AdminPage
$routes['api/dashboard/getPendingService'] = 'admin/dashboard/user/getPendingService'; // API lấy danh sách dịch vụ đã đăng ký đăng chờ duyệt
$routes['api/dashboard/isRegistered'] = 'admin/dashboard/user/isRegistered'; // API lấy trạng thái dịch vụ người dùng đã đăng ký

$routes['api/dashboard/getList'] = 'admin/dashboard/product/getListProduct';//API lấy danh sách sản phẩm

// User API
$routes['api/users/update'] = 'user/profile/updateInfo'; // API update thông tin người dùng - Profile
$routes['api/users/getService'] = 'user/profile/getService'; // API lấy danh sách dịch vụ đã đăng ký - Profile
$routes['api/users/registerService'] = 'user/user/registerService'; // API người dùng đăng ký dịch vụ - User
$routes['api/users/deleteService'] = 'user/profile/deleteService'; // API xoá dịch vụ đã đăng ký - Profile
?>