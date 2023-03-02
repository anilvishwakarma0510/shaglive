@extends('admin.layouts.app')

@section('title', 'Home')

@section('header')
@include('admin.layouts.header')
@endsection

@section('sidebar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
   <div id="layoutSidenav_content" class="bg-dark">
                <main class="" >
                    <div class="container-fluid px-4">
                        <h3 class="mt-3 text-white page-ttl pb-3 mb-4">Transaction History</h3>
                        <div class="row">
                           <div class="col-sm-12 bg-light pt-4 pb-3 data-t">
                                <table id="test" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Transaction ID  </th>
                                                <th>Products  </th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Created on</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>B9A100AC</td>
                                                <td><b> Basic</b><br> 9.99 for 50 tokens</td>
                                                <td>9.99  </td>
                                                <td class="text-success" >Success</td>
                                                <td>16/08/2022 17:37:35</td>
                                            </tr>
                                            <tr>
                                                <td>B9A100AC</td>
                                                <td><b> Basic</b><br> 9.99 for 50 tokens</td>
                                                <td>9.99  </td>
                                                <td class="text-success" >Success</td>
                                                <td>16/08/2022 17:37:35</td>
                                            </tr>
                                            <tr>
                                                <td>B9A100AC</td>
                                                <td><b> Basic</b><br> 9.99 for 50 tokens</td>
                                                <td>9.99  </td>
                                                <td class="text-success" >Success</td>
                                                <td>16/08/2022 17:37:35</td>
                                            </tr>
                                            <tr>
                                                <td>B9A100AC</td>
                                                <td><b> Basic</b><br> 9.99 for 50 tokens</td>
                                                <td>9.99  </td>
                                                <td class="text-success" >Success</td>
                                                <td>16/08/2022 17:37:35</td>
                                            </tr>
                                        </tbody>
                                    </table>
                           </div>
                        </div>
                    </div>
                </main>
            </div>


@endsection

@section('footer')
@include('admin.layouts.footer')
@endsection