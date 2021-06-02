@extends('admin.master.layout')
@section('content')
<div class="container mt-5">
  <div class="row tm-content-row">
    <div class="col-12 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <h2 class="tm-block-title">List of Accounts</h2>
        <p class="text-white">Accounts</p>
        <select class="custom-select">
          <option value="0">Select account</option>
          <option value="1">Admin</option>
          <option value="2">Editor</option>
          <option value="3">Merchant</option>
          <option value="4">Customer</option>
        </select>
      </div>
    </div>
  </div>
  <!-- row -->
    <div class="row tm-content-row">
      <div class="col-12 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <div class="tm-product-table-container">
            <table class="table table-hover tm-table-small tm-product-table">
              <thead>
                <tr>
                  <th scope="col">&nbsp;</th>
                  <th scope="col">USERNAME</th>
                  <th scope="col">EMAIL</th>
                  <th scope="col">ROLE</th>
                  <th scope="col">UPDATED AT</th>
                  <th scope="col">CREATED AT</th>
                  <th scope="col">&nbsp;</th>
                </tr>
              </thead>
              <tbody id="account-body">
                <tr>
                  <th scope="row"><input type="checkbox" /></th>
                  <td class="tm-product-name">user1</td>
                  <td>user1@gmail.com</td>
                  <td>User</td>
                  <td>20/05/2021</td>
                  <td>20/05/2021</td>
                  <td>
                    <a href="#" class="tm-product-delete-link">
                      <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <th scope="row"><input type="checkbox" /></th>
                  <td class="tm-product-name">user1</td>
                  <td>user1@gmail.com</td>
                  <td>User</td>
                  <td>20/05/2021</td>
                  <td>20/05/2021</td>
                  <td>
                    <a href="#" class="tm-product-delete-link">
                      <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <th scope="row"><input type="checkbox" /></th>
                  <td class="tm-product-name">user1</td>
                  <td>user1@gmail.com</td>
                  <td>User</td>
                  <td>20/05/2021</td>
                  <td>20/05/2021</td>
                  <td>
                    <a href="#" class="tm-product-delete-link">
                      <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <th scope="row"><input type="checkbox" /></th>
                  <td class="tm-product-name">user1</td>
                  <td>user1@gmail.com</td>
                  <td>User</td>
                  <td>20/05/2021</td>
                  <td>20/05/2021</td>
                  <td>
                    <a href="#" class="tm-product-delete-link">
                      <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <th scope="row"><input type="checkbox" /></th>
                  <td class="tm-product-name">user2</td>
                  <td>user2@gmail.com</td>
                  <td>Admin</td>
                  <td>20/05/2021</td>
                  <td>20/05/2021</td>
                  <td>
                    <a href="#" class="tm-product-delete-link">
                      <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <th scope="row"><input type="checkbox" /></th>
                  <td class="tm-product-name">user2</td>
                  <td>user2@gmail.com</td>
                  <td>Admin</td>
                  <td>20/05/2021</td>
                  <td>20/05/2021</td>
                  <td>
                    <a href="#" class="tm-product-delete-link">
                      <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <th scope="row"><input type="checkbox" /></th>
                  <td class="tm-product-name">user2</td>
                  <td>user2@gmail.com</td>
                  <td>Admin</td>
                  <td>20/05/2021</td>
                  <td>20/05/2021</td>
                  <td>
                    <a href="#" class="tm-product-delete-link">
                      <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- table container -->
          <a href="{{ url('/admin/add-account') }}" class="btn btn-primary btn-block text-uppercase mb-3">THÊM TÀI KHOẢN MỚI</a>
          <button class="btn btn-primary btn-block text-uppercase">
            XOÁ TÀI KHOẢN ĐƯỢC CHỌN
          </button>
        </div>
      </div>
    </div>
</div>
@endsection