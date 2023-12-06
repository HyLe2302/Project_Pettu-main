<?php
class Product extends Controller {
    private $productModel;

    public function __construct() {
        $this->productModel = $this->model('ProductModel', 'admin');
    }

    // Lấy danh sách tất cả Sản Phẩm 
    public function getListProduct() {
        $request = new Request();

        if ($request->isGet()): // Kiểm tra get
            
            $result = $this->productModel->handleGetListProduct(); // Gọi xử lý ở Model

            if (!empty($result)):
                $response = [
                    'status' =>true,
                    'data'=> $result
                ];
            else:
                $response = [
                    'message' => 'Đã có lỗi xảy ra'
                ];
            endif;

            echo json_encode($response);
        endif;
    }

    public function addProduct(){
        $request = new Request();
        $response =[];

        if ($request->isPost()):
            $data = $request->getFields();

            if(!empty($data)):
                $request->rules([
                    ''
                ]);
            endif;
            

        endif;

    }
    
    // Update trạng thái account
    // public function updateStatusAccount() {
    //     $request = new Request();

    //     if ($request->isPost()): // Kiểm tra get
    //         $data = $request->getFields();

    //         if (!empty($data['userId'])):
    //             $userId = $data['userId'];

    //             $result = $this->userModel->handleUpdateStatusAccount($userId); // Gọi xử lý ở Model

    //             if (!empty($result)):
    //                 $response = [
    //                     'message' => 'Thay đổi thành công',
    //                 ];
    //             else:
    //                 $response = [
    //                     'message' => 'Đã có lỗi xảy ra'
    //                 ];
    //             endif;
    //         else:
    //             $response = [
    //                 'message' => 'Đã có lỗi xảy ra'
    //             ];
    //         endif;

    //         echo json_encode($response);
           
    //     endif;
    // }
}