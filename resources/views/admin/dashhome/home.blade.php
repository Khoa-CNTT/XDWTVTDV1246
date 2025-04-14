@extends('admin.dashboard')
@section('content')
    <style>
        .main {
            position: absolute;
            width: calc(100% - 300px);
            left: 300px;
            min-height: 100vh;
            background: #fff;
        }

        .cardBox {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 20px;
        }

        .cardBox .card {
            background: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cardBox .card .numbers {
            font-size: 2em;
            font-weight: bold;
            color: #007bff;
        }

        .cardBox .card .cardName {
            font-size: 1em;
            color: #333;
        }

        .cardBox .card .iconBx {
            font-size: 2.5em;
            color: #666;
        }

        .graphBox {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 20px;
            padding: 20px;
        }

        .graphBox .box {
            background: #fff;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .details {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            padding: 20px;
        }

        .details .recentOrders,
        .recentCustomers {
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .cardHeader {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .cardHeader h2 {
            font-size: 1.2em;
            color: #007bff;
        }

        .btn {
            padding: 5px 10px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead td {
            font-weight: bold;
            padding: 10px;
            background: #f1f1f1;
            border: 1px solid #ddd;
        }

        table tbody tr td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 14px;
        }

        .status {
            padding: 4px 6px;
            border-radius: 4px;
            font-size: 12px;
            color: #fff;
        }

        .status.delivered {
            background: #28a745;
        }

        .status.pending {
            background: #ffc107;
        }

        .status.return {
            background: #dc3545;
        }

        .status.inprogress {
            background: #17a2b8;
        }

        .recentCustomers .imgBx {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
        }

        .recentCustomers .imgBx img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .recentCustomers table tr td {
            padding: 10px;
        }

        .recentCustomers table tr td h4 {
            margin: 0;
            font-size: 14px;
        }

        .recentCustomers table tr td h4 span {
            font-size: 12px;
            color: #888;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .graphBox {
                grid-template-columns: 1fr;
            }

            .cardBox {
                grid-template-columns: repeat(2, 1fr);
            }

            .details {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .cardBox {
                grid-template-columns: 1fr;
            }

            .cardHeader h2 {
                font-size: 18px;
            }
        }
    </style>










    <div class="main">

        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers">1,504</div>
                    <div class="cardName">Daily Views</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">80</div>
                    <div class="cardName">Sales</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="cart-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">284</div>
                    <div class="cardName">Comments</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="chatbubbles-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">$7,842</div>
                    <div class="cardName">Earning</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="cash-outline"></ion-icon>
                </div>
            </div>
        </div>
        <div class="graphBox">
            <div class="box">
                <canvas id="myChart"></canvas>
            </div>
            <div class="box">
                <canvas id="earning"></canvas>
            </div>
        </div>

        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Recent Orders</h2>
                    <a href="#" class="btn">View All</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Payment</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Star Refrigerator</td>
                            <td>$1200</td>
                            <td>Paid</td>
                            <td><span class="status delivered">Delivered</span></td>
                        </tr>
                        <tr>
                            <td>Window Coolers</td>
                            <td>$110</td>
                            <td>Due</td>
                            <td><span class="status pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td>Speakers</td>
                            <td>$620</td>
                            <td>Paid</td>
                            <td><span class="status return">Return</span></td>
                        </tr>
                        <tr>
                            <td>Hp Laptop</td>
                            <td>$110</td>
                            <td>Due</td>
                            <td><span class="status inprogress">In Progress</span></td>
                        </tr>
                        <tr>
                            <td>Apple Watch</td>
                            <td>$1200</td>
                            <td>Paid</td>
                            <td><span class="status delivered">Delivered</span></td>
                        </tr>
                        <tr>
                            <td>Wall Fan</td>
                            <td>$110</td>
                            <td>Paid</td>
                            <td><span class="status pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td>Adidas Shoes</td>
                            <td>$620</td>
                            <td>Paid</td>
                            <td><span class="status return">Return</span></td>
                        </tr>
                        <tr>
                            <td>Denim Shirts</td>
                            <td>$110</td>
                            <td>Due</td>
                            <td><span class="status inprogress">In Progress</span></td>
                        </tr>
                        <tr>
                            <td>Casual Shoes</td>
                            <td>$575</td>
                            <td>Paid</td>
                            <td><span class="status pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td>Wall Fan</td>
                            <td>$110</td>
                            <td>Paid</td>
                            <td><span class="status pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td>Denim Shirts</td>
                            <td>$110</td>
                            <td>Due</td>
                            <td><span class="status inprogress">In Progress</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="recentCustomers">
                <div class="cardHeader">
                    <h2>Recent Customers</h2>
                </div>
                <table>
                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="{{ asset('admin/images/img1.jpg') }}" /></div>
                        </td>
                        <td>
                            <h4>Coding World<br /><span>Italy</span></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="imgBx"><img src="{{ asset('admin/images/img2.jpg') }}" /></div>
                        </td>
                        <td>
                            <h4>Coding World<br /><span>India</span></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="imgBx"><img src="{{ asset('admin/images/img3.jpg') }}" /></div>
                        </td>
                        <td>
                            <h4>Coding World<br /><span>France</span></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="imgBx"><img src="{{ asset('admin/images/img4.jpg') }}" /></div>
                        </td>
                        <td>
                            <h4>Coding World<br /><span>USA</span></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="imgBx"><img src="{{ asset('admin/images/img5.jpg') }}" /></div>
                        </td>
                        <td>
                            <h4>Coding World<br /><span>Japan</span></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="imgBx"><img src="{{ asset('admin/images/img6.jpg') }}" /></div>
                        </td>
                        <td>
                            <h4>Coding World<br /><span>India</span></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="imgBx"><img src="{{ asset('admin/images/img7.jpg') }}" /></div>
                        </td>
                        <td>
                            <h4>Coding World<br /><span>Malaysia</span></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="imgBx"><img src="{{ asset('admin/images/img8.jpg') }}" /></div>
                        </td>
                        <td>
                            <h4>Coding World<br /><span>India</span></h4>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="{{ asset('admin/js/my_chart.js') }}"></script>
   
@endsection
