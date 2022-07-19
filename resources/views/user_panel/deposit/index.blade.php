@extends('layouts.app')


@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

    <style type="text/css">
        /*#example_wrapper{
            width:100%;
            padding:0% 2%;
            }
            .page-body .page-content-wrapper{
            padding: 10px 10px;
            }*/
        #card1:hover {
            border: 1px solid rgba(255, 155, 30, 0.3) !important;
        }

        .activet {
            border-bottom: 3px solid #ff9b1e;
            color: #ff9b1e;
        }

        ul#ONE {
            float: right;
        }

        ul#ONE li {
            display: inline-block;
        }

        ul#six {
            margin: 0px;
            padding: 0px;
        }

        ul#six li {
            display: inline;
        }

        ul#six li img {
            width: 110px !important;
        }

        ul#five {
            margin: 0px;
            padding: 0px;
            text-align: center;
        }

        ul#five li {
            display: inline;
        }

        ul#five li img {
            width: 90px !important;
        }

    </style>

    <!-- <a class="btn btn-success" data-toggle="modal" onclick="editOrder()" data-target="#exampleModalCenter">
            Confirm Order
            </a> -->

    <div class="page-content-wrapper-inner">

        <?php
$message = Session::get('success');
if($message){
?>
        <h4 class="alert alert-success">
            <?php
            echo $message;
            Session::put('success', '');
            ?>
        </h4>
        <?php } ?>


        <?php
$message2 = Session::get('load_credit_requests');
if($message2){
?>

        <h4 class="alert alert-success">
            <?php
            echo $message2;
            Session::put('load_credit_requests', '');
            ?>
        </h4>

        <?php } ?>



        <div class="content-viewport">

            <div class="row">

                <div class="col-md-12">


                    <ul id="ONE">
                        <li>

                            <a href="{{ url('deposit') }}">
                                <button class="btn btn-success"
                                    style="min-width: 110px;max-width: 100%;width: auto;margin-right: 10px;background:transparent;color:#4CCEAC;text-transform: uppercase;font-size: 16px;">Deposit</button></a>
                        </li>
                        <li>
                            <a href="{{ url('load') }}"><button style="min-width: 110px;max-width: 100%;width: auto;text-transform: uppercase;
            font-size: 16px;color:#fff;" class="btn btn-success">Send</button></a>
                        </li>
                    </ul>
                    <br />

                </div>

            </div>



            <div class="row" style="margin-top:40px;">

                <div class="col-md-12">



                </div>

            </div>


            <div class="row" style="margin-top:40px;">

                <div class="col-12" style="border:.5px solid #cccccc78;">
                </div>

            </div>
            <p style="text-align: center;"> </p>
            <div class="row-fluid" style="overflow: hidden;clear: both;
            display: block;background: #f0f8ffb5;padding: 20px 0px 60px 0px;">
                <br />

                <div class="span12" style="overflow:hidden;padding-left: 100px;">
                    <!-- <span style="float:left; padding-top: 40px;"> Manual Method: </span> -->

                    <!-- <span style="float:left; padding-top: 40px;"><img alt="" width="20" src="{{ url('images/backend_images/green.svg') }}"> Manual Method: </span> -->
                    <div class="col-md-8" style="float:left; padding-left: 20px;">

                        <ul id="five">
                            <li><span style="color: blue;"> 🟢 Instant Method :</span></li>
                            <li>

                                <button data-toggle="modal" data-target="#myModal"
                                    style="border:none;margin:0px; padding:0px;">
                                    <img src="{{ asset('img/paypal.png') }}" </button>

                            </li>
                            <li><a target="_blank"
                                    href="{{ url('https://commerce.coinbase.com/checkout/92d7d60b-3041-4297-9fd7-a2582e1902c3') }}">
                                    <img src="{{ asset('img/coinbase.png') }}"></a></li>
                        </ul>

                        <!-- <img style="border: 2px solid #CDCDCD;" onclick="toogleClick('PerfectMoney');" id="perfectmoney" width="150" src="{{ url('card/perfectMoney.svg') }}">
                <img style="border: 2px solid #CDCDCD;" onclick="toogleClick('Neteller');" id="neteller" width="150" src="{{ url('card/neteller.svg') }}">
                <img style="border: 2px solid #CDCDCD;" onclick="toogleClick('Skrill');" id="skrill" width="150" src="{{ url('card/skrill.svg') }}">
                <img style="border: 2px solid #CDCDCD;" onclick="toogleClick('Payoneer');" id="payoneer" width="150" src="{{ url('card/payoneer.svg') }}"> -->

                    </div>
                </div>

                <br />

                <div class="span12" style="overflow:hidden;padding-left: 100px;">
                    <!-- <span style="float:left; padding-top: 40px;"> Manual Method: </span> -->

                    <!-- <span style="float:left; padding-top: 40px;"><img alt="" width="20" src="{{ url('images/backend_images/green.svg') }}"> Manual Method: </span> -->
                    <div class="col-md-10" style="float:left; padding-left: 20px;">

                        <ul id="six">
                            <li>
                                <button data-toggle="modal" data-target="#skrillModal"
                                    style="border:none;margin:0px; padding:0px;">
                                    <img src="{{ asset('img/Advash.png') }}">
                                </button>
                            </li>
                            <li>
                                <!--<button data-toggle="modal" data-target="#NetellerModal"  style="border:none;margin:0px; padding:0px;">-->
                                <!--<img src="{{ asset('img/paypal-pay.png') }}"></button>-->
                            </li>
                            <li>
                                <button data-toggle="modal" data-target="#PayoneerModal"
                                    style="border:none;margin:0px; padding:0px;">
                                    <img src="{{ asset('img/payoneer.png') }}"></button>
                            </li>

                            <li>
                                <button data-toggle="modal" data-target="#WebMoneyModal"
                                    style="border:none;margin:0px; padding:0px;">
                                    <img src="{{ asset('img/Webmoney.png') }}"></button>
                            </li>

                            <li>
                                <button data-toggle="modal" data-target="#ecoPayzModal"
                                    style="border:none;margin:0px; padding:0px;">
                                    <img src="{{ asset('img/perfectmoney.png') }}">
                                </button>
                            </li>
                            <li>
                                <button data-toggle="modal" data-target="#PAYEERModal"
                                    style="border:none;margin:0px; padding:0px;">
                                    <img src="{{ asset('img/payeer.png') }}"></button>
                            </li>
                        </ul>
                        {{-- <img style="border: 2px solid #CDCDCD;" onclick="toogleClick('PerfectMoney');" id="perfectmoney" width="150" src="{{ url('card/perfectMoney.svg') }}">
        <img style="border: 2px solid #CDCDCD;" onclick="toogleClick('Neteller');" id="neteller" width="150" src="{{ url('card/neteller.svg') }}">
        <img style="border: 2px solid #CDCDCD;" onclick="toogleClick('Skrill');" id="skrill" width="150" src="{{ url('card/skrill.svg') }}">
        <img style="border: 2px solid #CDCDCD;" onclick="toogleClick('Payoneer');" id="payoneer" width="150" src="{{ url('card/payoneer.svg') }}"> --}}

                    </div>
                </div>

            </div>

            <div class="row" style="overflow:hidden;clear: both;">

                <div class="col-6">

                    <div id="PerfectMoney" style="display:none;">
                        <form action="{{ url('save-deposit') }}" name="buy_credit" id="buy_credit" method="post">

                            @csrf

                            <input type="hidden" id="method-name" name="payment_method_name" value="PerfectMoney">
                            <br>

                            <div class="form-group">
                                <label for="inputCard">Send Money to:</label>
                                <input type="text" required="" class="form-control" value="U21645562" disabled=""
                                    name="send_money" id="send-money">
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Enter Amount:</label>
                                <input type="text" class="form-control" name="amount" id="amount"
                                    placeholder="Enter Amount">
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Transaction Details:</label>

                                <input type="text" class="form-control" name="transaction_details"
                                    id="transaction_details" placeholder="Enter your Transaction details">
                            </div>

                            <p style="color:red;">Note: After payment you can knock us in live chat or Email:
                                Payment@brpto.com
                                <br>We will add credit within Couple Of Minutes
                            </p>
                            <br />
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>

                        </form>

                    </div>


                </div>






            </div>




        </div>
    </div>

    <style type="text/css">
        /*.active{
            border-bottom: 3px solid #ff9b1e;
            color: #ff9b1e;
            transition: color 0.2s ease, border-bottom-color 0.2s ease;
            }*/

    </style>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="">
                    <h4 class="modal-title">Paypal</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" method="POST" id="payment-form" role="form"
                        action="{!! URL::route('paypal') !!}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">

                            <div style="margin:0 auto;" class="col-md-6">
                                <label for="amount" class=" control-label">Enter Amount</label>
                                <input style="border: 1px solid #ccc;" id="amount" type="text" class="form-control"
                                    name="amount" value="{{ old('amount') }}" autofocus>

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div style="margin:0 auto;" class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Paywith Paypal
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!--Skrill Modal -->
    <div id="skrillModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="">
                    <h4 class="modal-title">Advcash</h4>
                </div>
                <div class="modal-body">

                    <div id="Advcash">

                        <form action="{{ url('save-deposit') }}" name="buy_credit" id="buy_credit" method="post">

                            @csrf

                            <input type="hidden" id="method-name" name="payment_method_name" value="Advcash">
                            <br>

                            <div class="form-group">
                                <label for="inputCard">Send Money to:</label>
                                <input type="text" required="" class="form-control" value="U 1226 1394 9848" disabled=""
                                    name="send_money" id="send-money">
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Minimum amount of send money $25</label>
                                <input type="text" class="form-control" name="amount" id="amount"
                                    placeholder="Enter Amount">
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Transaction Details:</label>

                                <input type="text" class="form-control" name="transaction_details"
                                    id="transaction_details" placeholder="Enter your Transaction details">
                            </div>

                            <p style="color:red;">Note: After payment you can knock us in live chat or Email:
                                hello@yufacard.com
                                <br>We will add money in your wallet within couple of seconds or minutes .
                            </p>
                            <br />
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>

                        </form>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!--Neteller Modal -->
    <div id="NetellerModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="">
                    <h4 class="modal-title">PayPal</h4>
                </div>
                <div class="modal-body">

                    <div id="PayPal">

                        <form action="{{ url('save-deposit') }}" name="buy_credit" id="buy_credit" method="post">

                            @csrf

                            <input type="hidden" id="method-name" name="payment_method_name" value="PayPal">
                            <br>

                            <div class="form-group">
                                <label for="inputCard">Send Money to:</label>
                                <input type="text" required="" class="form-control" value="payments@yufacard.com
            " disabled="" name="send_money" id="send-money">
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Minimum amount of send money $25</label>
                                <input type="text" class="form-control" name="amount" id="amount"
                                    placeholder="Enter Amount">
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Transaction Details:</label>

                                <input type="text" class="form-control" name="transaction_details"
                                    id="transaction_details" placeholder="Enter your Transaction details">
                            </div>

                            <p style="color:red;">Note: After payment you can knock us in live chat or Email:
                                hello@yufacard.com
                                <br>We will add money in your wallet within couple of seconds or minutes .
                            </p>
                            <br />
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>

                        </form>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!--Payoneer Modal -->
    <div id="PayoneerModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="">
                    <h4 class="modal-title">Payoneer</h4>
                </div>
                <div class="modal-body">

                    <div id="Payoneer">

                        <form action="{{ url('save-deposit') }}" name="buy_credit" id="buy_credit" method="post">

                            @csrf

                            <input type="hidden" id="method-name" name="payment_method_name" value="Payoneer">
                            <br>

                            <div class="form-group">
                                <label for="inputCard">Send Money to:</label>
                                <input type="text" required="" class="form-control" value="manualpay@yufacard.com"
                                    disabled="" name="send_money" id="send-money">
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Minimum amount of send money $50</label>
                                <input type="text" class="form-control" name="amount" id="amount"
                                    placeholder="Enter Amount">
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Transaction Details:</label>

                                <input type="text" class="form-control" name="transaction_details"
                                    id="transaction_details" placeholder="Enter your Transaction details">
                            </div>

                            <p style="color:red;">Note: After payment you can knock us in live chat or Email:
                                hello@yufacard.com
                                <br>We will add money in your wallet within couple of seconds or minutes .
                            </p>
                            <br />
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>

                        </form>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!--WebMoney Modal -->
    <div id="WebMoneyModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="">
                    <h4 class="modal-title">Web Money</h4>
                </div>
                <div class="modal-body">

                    <div id="WebMoney">

                        <form action="{{ url('save-deposit') }}" name="buy_credit" id="buy_credit" method="post">

                            @csrf

                            <input type="hidden" id="method-name" name="payment_method_name" value="Web Money">
                            <br>

                            <div class="form-group">
                                <label for="inputCard">Send Money to:</label>
                                <input type="text" required="" class="form-control" value="Z729580218000" disabled=""
                                    name="send_money" id="send-money">
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Minimum amount of send money $25</label>
                                <input type="text" class="form-control" name="amount" id="amount"
                                    placeholder="Enter Amount">
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Transaction Details:</label>

                                <input type="text" class="form-control" name="transaction_details"
                                    id="transaction_details" placeholder="Enter your Transaction details">
                            </div>

                            <p style="color:red;">Note: After payment you can knock us in live chat or Email:
                                hello@yufacard.com
                                <br>We will add money in your wallet within couple of seconds or minutes .
                            </p>
                            <br />
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>

                        </form>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!--ecoPayz Modal -->
    <div id="ecoPayzModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="">
                    <h4 class="modal-title">Perfect Money</h4>
                </div>
                <div class="modal-body">

                    <div id="ecoPayz">

                        {{-- <form action="https://perfectmoney.is/api/step1.asp" method="POST">
                        <p>
                            <input type="text" name="PAYEE_ACCOUNT" value="U36363822">
                            <input type="text" name="PAYMENT_UNITS" value="USD">
                          
                            <input type="text" name="PAYMENT_ID" placeholder="PAYMENT_ID">
                            <input type="text" name="PAYMENT_AMOUNT" placeholder="PAYMENT_AMOUNT" >
                            <input type="submit" name="PAYMENT_METHOD" value="submit">
                        </p>
                        </form> --}}



                        <form action="https://perfectmoney.is/api/step1.asp" name="buy_credit" id="buy_credit"
                            method="post">
                            @csrf

                            <input type="hidden" name="STATUS_URL" value="{{ route('parfect.money.status') }}">
                            <input type="hidden" name="PAYMENT_URL" value="{{ route('parfect.money.success') }}">
                            <input type="hidden" name="NOPAYMENT_URL" value="{{ route('parfect.money.error') }}">
                            <input type="hidden" name="PAYEE_NAME" value="Mahim">

                            <input type="hidden" id="method-name" name="payment_method_name" value="Perfect_Money">

                            <div class="form-group">
                                <label for="inputCard">Send Money to:</label>
                                <input type="text" required="" class="form-control" name="PAYEE_ACCOUNT"
                                    value="U21645562" id="send-money">
                            </div>

                            <div class="form-group">
                                <label for="inputCard">PAYMENT UNITS</label>
                                <input type="text" required="" class="form-control" name="PAYMENT_UNITS" value="USD"
                                    id="send-money">
                            </div>

                            <div class="form-group">
                                <label for="inputCard">Payment Id:</label>
                                <input type="text" required="" class="form-control"  name="PAYMENT_ID"
                                    placeholder="PAYMENT_ID" >
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Send money </label>
                                <input type="text" class="form-control" name="PAYMENT_AMOUNT" id="perfect_amount"
                                    placeholder="Enter Amount">
                            </div>

                            <p style="color:red;">Note: After payment you can knock us in live chat or Email:
                                hello@yufacard.com
                                <br>We will add money in your wallet within couple of seconds or minutes .
                            </p>
                            <br />
                            <input type="submit" name="PAYMENT_METHOD" value="SUBMIT"  id="perfect_money_submit"    class="btn btn-sm btn-primary">
                            {{-- <button type="submit" class="btn btn-sm btn-primary" >Submit</button> --}}
                            <input type="submit" name="CANCEL" value="CANCEL" class="btn btn-default"   data-dismiss="modal">
                        </form>

                    </div>

                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-default" >Close</button>
                </div> --}}
            </div>

        </div>
    </div>

    <!--PAYEER Modal -->
    <div id="PAYEERModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="">
                    <h4 class="modal-title">PAYEER</h4>
                </div>
                <div class="modal-body">

                    <div id="ecoPayz">

                        <form action="{{ url('save-deposit') }}" name="buy_credit" id="buy_credit" method="post">

                            @csrf

                            <input type="hidden" id="method-name" name="payment_method_name" value="PAYEER">
                            <br>

                            <div class="form-group">
                                <label for="inputCard">Send Money to:</label>
                                <input type="text" required="" class="form-control" value="P1063294472" disabled=""
                                    name="send_money" id="send-money">
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Minimum amount of send money $25</label>
                                <input type="text" class="form-control" name="amount" id="amount"
                                    placeholder="Enter Amount">
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Transaction Details:</label>

                                <input type="text" class="form-control" name="transaction_details"
                                    id="transaction_details" placeholder="Enter your Transaction details">
                            </div>

                            <p style="color:red;">Note: After payment you can knock us in live chat or Email:
                                hello@yufacard.com
                                <br>We will add money in your wallet within couple of seconds or minutes .
                            </p>
                            <br />
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>

                        </form>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        $('#perfect_money_submit').click(function() {
            let payment_method_name = document.getElementById('method-name').value;
            let perfect_amount = document.getElementById('perfect_amount').value;
            $.ajax({
                type: "POST",
                url: '/parfect-money-success',
                data: {
                  payment_method_name: payment_method_name,
                  perfect_amount: perfect_amount
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        });

        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/609bba6bb1d5182476b833a1/1f5g50e1o';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
@endsection
