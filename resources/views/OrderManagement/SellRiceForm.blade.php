@extends('Layouts.master')
@section('content')
    <style>

    </style>

    <h2>Make Rice Order</h2>
    <br>
    <div class="col-md-7 col-md-offset-1">
        <form action="{{route("createRiceOrder")}}" method="post">

            <div class="form-group">
                <label for="customerName">Customer Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="customerName" placeholder="Customer Name" name="customerName">
                    <div class="input-group-btn">
                        <a href="{{route('Customer')}}"  class="btn btn-default btn-flat" >
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" placeholder="Date" name="date">
            </div >
            <hr>
                <div class="form-group">
                    <label for="orderItem1">Order Item 1</label>
                    <select name="orderItem1" id="orderItem1" class="form-control" >
                        <option>Samba</option>
                        <option>Nadu</option>
                        <option>Red Samba</option>
                        <option>Red Nadu</option>
                        <option>Kiri Samba</option>
                        <option>Suvandal</option>
                        <option>Kekulu Samba</option>
                        <option>Sudu Kekulu</option>
                        <option>Kekulu</option>
                        <option>Red Kekulu</option>
                        <option>Kekulu Kiri</option>
                    </select>
                </div>
                <br>
                <div class="form-inline">
                    <div class="form-group">
                        <label for="quantity1">Quantity</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="quantity1" placeholder="Quantity" name="quantity1">
                            <div class="input-group-addon">kg</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unitPrice1">Unit Price</label>
                        <div class="input-group">
                            <div class="input-group-addon">Rs</div>
                            <input type="number" class="form-control" id="unitPrice1" placeholder="Unit price" name="unitPrice1">
                        </div>
                    </div>
                    <br><br>
                </div>
            <br>
            <button type="submit" class="btn btn-primary" id="addItem2" onclick="document.getElementById('addItemForm2').style.display='';
                document.getElementById('addItem2').style.display='none'; return false">Add Item</button>
            <br><br>
            <div id="addItemForm2" style="display:none">
                <hr>
                <div class="form-group">
                    <label for="orderItem2">Order Item 2</label>
                    <select name="orderItem2" id="orderItem2" class="form-control" >
                        <option>Samba</option>
                        <option>Nadu</option>
                        <option>Red Samba</option>
                        <option>Red Nadu</option>
                        <option>Kiri Samba</option>
                        <option>Suvandal</option>
                        <option>Kekulu Samba</option>
                        <option>Sudu Kekulu</option>
                        <option>Kekulu</option>
                        <option>Red Kekulu</option>
                        <option>Kekulu Kiri</option>
                    </select>
                </div>
                <br>
                <div class="form-inline">
                    <div class="form-group">
                        <label for="quantity2">Quantity</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="quantity2" placeholder="Quantity" name="quantity2">
                            <div class="input-group-addon">kg</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unitPrice2">Unit Price</label>
                        <div class="input-group">
                            <div class="input-group-addon">Rs</div>
                            <input type="number" class="form-control" id="unitPrice2" placeholder="Unit price" name="unitPrice2">
                        </div>
                    </div>
                    <br><br>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" id="addItem3" onclick="document.getElementById('addItemForm3').style.display='';
                document.getElementById('addItem3').style.display='none'; return false">Add Item</button>
            </div>

            <div id="addItemForm3" style="display:none">
                <hr>
                <div class="form-group">
                    <label for="orderItem3">Order Item 3</label>
                    <select name="orderItem3" id="orderItem3" class="form-control" >
                        <option>Samba</option>
                        <option>Nadu</option>
                        <option>Red Samba</option>
                        <option>Red Nadu</option>
                        <option>Kiri Samba</option>
                        <option>Suvandal</option>
                        <option>Kekulu Samba</option>
                        <option>Sudu Kekulu</option>
                        <option>Kekulu</option>
                        <option>Red Kekulu</option>
                        <option>Kekulu Kiri</option>
                    </select>
                </div>
                <br>
                <div class="form-inline">
                    <div class="form-group">
                        <label for="quantity3">Quantity</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="quantity3" placeholder="Quantity" name="quantity3">
                            <div class="input-group-addon">kg</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unitPrice2">Unit Price</label>
                        <div class="input-group">
                            <div class="input-group-addon">Rs</div>
                            <input type="number" class="form-control" id="unitPrice3" placeholder="Unit price" name="unitPrice3">
                        </div>
                    </div>
                    <br><br>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" id="addItem4" onclick="document.getElementById('addItemForm4').style.display='';
                document.getElementById('addItem4').style.display='none'; return false">Add Item</button>
            </div>


            <div id="addItemForm4" style="display:none">
                <hr>
                <div class="form-group">
                    <label for="orderItem4">Order Item 4</label>
                    <select name="orderItem4" id="orderItem4" class="form-control" >
                        <option>Samba</option>
                        <option>Nadu</option>
                        <option>Red Samba</option>
                        <option>Red Nadu</option>
                        <option>Kiri Samba</option>
                        <option>Suvandal</option>
                        <option>Kekulu Samba</option>
                        <option>Sudu Kekulu</option>
                        <option>Kekulu</option>
                        <option>Red Kekulu</option>
                        <option>Kekulu Kiri</option>
                    </select>
                </div>
                <br>
                <div class="form-inline">
                    <div class="form-group">
                        <label for="quantity4">Quantity</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="quantity4" placeholder="Quantity" name="quantity4">
                            <div class="input-group-addon">kg</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unitPrice4">Unit Price</label>
                        <div class="input-group">
                            <div class="input-group-addon">Rs</div>
                            <input type="number" class="form-control" id="unitPrice4" placeholder="Unit price" name="unitPrice4">
                        </div>
                    </div>
                    <br><br>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" id="addItem5" onclick="document.getElementById('addItemForm5').style.display='';
                document.getElementById('addItem5').style.display='none'; return false">Add Item</button>
            </div>

            <div id="addItemForm5" style="display:none">
                <hr>
                <div class="form-group">
                    <label for="orderItem5">Order Item 4</label>
                    <select name="orderItem5" id="orderItem5" class="form-control" >
                        <option>Samba</option>
                        <option>Nadu</option>
                        <option>Red Samba</option>
                        <option>Red Nadu</option>
                        <option>Kiri Samba</option>
                        <option>Suvandal</option>
                        <option>Kekulu Samba</option>
                        <option>Sudu Kekulu</option>
                        <option>Kekulu</option>
                        <option>Red Kekulu</option>
                        <option>Kekulu Kiri</option>
                    </select>
                </div>
                <br>
                <div class="form-inline">
                    <div class="form-group">
                        <label for="quantity5">Quantity</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="quantity5" placeholder="Quantity" name="quantity5">
                            <div class="input-group-addon">kg</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unitPrice5">Unit Price</label>
                        <div class="input-group">
                            <div class="input-group-addon">Rs</div>
                            <input type="number" class="form-control" id="unitPrice5" placeholder="Unit price" name="unitPrice5">
                        </div>
                    </div>
                    <br><br>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" id="addItem6" onclick="document.getElementById('addItemForm6').style.display='';
                document.getElementById('addItem6').style.display='none'; return false">Add Item</button>
            </div>

            <div id="addItemForm6" style="display:none">
                <hr>
                <div class="form-group">
                    <label for="orderItem6">Order Item 6</label>
                    <select name="orderItem6" id="orderItem6" class="form-control" >
                        <option>Samba</option>
                        <option>Nadu</option>
                        <option>Red Samba</option>
                        <option>Red Nadu</option>
                        <option>Kiri Samba</option>
                        <option>Suvandal</option>
                        <option>Kekulu Samba</option>
                        <option>Sudu Kekulu</option>
                        <option>Kekulu</option>
                        <option>Red Kekulu</option>
                        <option>Kekulu Kiri</option>
                    </select>
                </div>
                <br>
                <div class="form-inline">
                    <div class="form-group">
                        <label for="quantity6">Quantity</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="quantity6" placeholder="Quantity" name="quantity6">
                            <div class="input-group-addon">kg</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unitPrice6">Unit Price</label>
                        <div class="input-group">
                            <div class="input-group-addon">Rs</div>
                            <input type="number" class="form-control" id="unitPrice6" placeholder="Unit price" name="unitPrice6">
                        </div>
                    </div>
                    <br><br>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" id="addItem7" onclick="document.getElementById('addItemForm7').style.display='';
                document.getElementById('addItem7').style.display='none'; return false">Add Item</button>
            </div>

            <div id="addItemForm7" style="display:none">
                <hr>
                <div class="form-group">
                    <label for="orderItem7">Order Item 7</label>
                    <select name="orderItem7" id="orderItem7" class="form-control" >
                        <option>Samba</option>
                        <option>Nadu</option>
                        <option>Red Samba</option>
                        <option>Red Nadu</option>
                        <option>Kiri Samba</option>
                        <option>Suvandal</option>
                        <option>Kekulu Samba</option>
                        <option>Sudu Kekulu</option>
                        <option>Kekulu</option>
                        <option>Red Kekulu</option>
                        <option>Kekulu Kiri</option>
                    </select>
                </div>
                <br>
                <div class="form-inline">
                    <div class="form-group">
                        <label for="quantity7">Quantity</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="quantity7" placeholder="Quantity" name="quantity7">
                            <div class="input-group-addon">kg</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unitPrice7">Unit Price</label>
                        <div class="input-group">
                            <div class="input-group-addon">Rs</div>
                            <input type="number" class="form-control" id="unitPrice7" placeholder="Unit price" name="unitPrice7">
                        </div>
                    </div>
                    <br><br>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" id="addItem8" onclick="document.getElementById('addItemForm8').style.display='';
                document.getElementById('addItem8').style.display='none'; return false">Add Item</button>
            </div>

            <div id="addItemForm8" style="display:none">
                <hr>
                <div class="form-group">
                    <label for="orderItem8">Order Item 8</label>
                    <select name="orderItem8" id="orderItem8" class="form-control" >
                        <option>Samba</option>
                        <option>Nadu</option>
                        <option>Red Samba</option>
                        <option>Red Nadu</option>
                        <option>Kiri Samba</option>
                        <option>Suvandal</option>
                        <option>Kekulu Samba</option>
                        <option>Sudu Kekulu</option>
                        <option>Kekulu</option>
                        <option>Red Kekulu</option>
                        <option>Kekulu Kiri</option>
                    </select>
                </div>
                <br>
                <div class="form-inline">
                    <div class="form-group">
                        <label for="quantity8">Quantity</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="quantity8" placeholder="Quantity" name="quantity8">
                            <div class="input-group-addon">kg</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unitPrice8">Unit Price</label>
                        <div class="input-group">
                            <div class="input-group-addon">Rs</div>
                            <input type="number" class="form-control" id="unitPrice8" placeholder="Unit price" name="unitPrice8">
                        </div>
                    </div>
                    <br><br>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" id="addItem9" onclick="document.getElementById('addItemForm9').style.display='';
                document.getElementById('addItem9').style.display='none'; return false">Add Item</button>
            </div>

            <div id="addItemForm9" style="display:none">
                <hr>
                <div class="form-group">
                    <label for="orderItem9">Order Item 9</label>
                    <select name="orderItem9" id="orderItem9" class="form-control" >
                        <option>Samba</option>
                        <option>Nadu</option>
                        <option>Red Samba</option>
                        <option>Red Nadu</option>
                        <option>Kiri Samba</option>
                        <option>Suvandal</option>
                        <option>Kekulu Samba</option>
                        <option>Sudu Kekulu</option>
                        <option>Kekulu</option>
                        <option>Red Kekulu</option>
                        <option>Kekulu Kiri</option>
                    </select>
                </div>
                <br>
                <div class="form-inline">
                    <div class="form-group">
                        <label for="quantity9">Quantity</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="quantity9" placeholder="Quantity" name="quantity9">
                            <div class="input-group-addon">kg</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unitPrice9">Unit Price</label>
                        <div class="input-group">
                            <div class="input-group-addon">Rs</div>
                            <input type="number" class="form-control" id="unitPrice9" placeholder="Unit price" name="unitPrice9">
                        </div>
                    </div>
                    <br><br>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" id="addItem10" onclick="document.getElementById('addItemForm10').style.display='';
                document.getElementById('addItem10').style.display='none'; return false">Add Item</button>
            </div>

            <div id="addItemForm10" style="display:none">
                <hr>
                <div class="form-group">
                    <label for="orderItem10">Order Item 10</label>
                    <select name="orderItem10" id="orderItem10" class="form-control" >
                        <option>Samba</option>
                        <option>Nadu</option>
                        <option>Red Samba</option>
                        <option>Red Nadu</option>
                        <option>Kiri Samba</option>
                        <option>Suvandal</option>
                        <option>Kekulu Samba</option>
                        <option>Sudu Kekulu</option>
                        <option>Kekulu</option>
                        <option>Red Kekulu</option>
                        <option>Kekulu Kiri</option>
                    </select>
                </div>
                <br>
                <div class="form-inline">
                    <div class="form-group">
                        <label for="quantity10">Quantity</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="quantity10" placeholder="Quantity" name="quantity10">
                            <div class="input-group-addon">kg</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unitPrice10">Unit Price</label>
                        <div class="input-group">
                            <div class="input-group-addon">Rs</div>
                            <input type="number" class="form-control" id="unitPrice10" placeholder="Unit price" name="unitPrice10">
                        </div>
                    </div>
                    <br><br>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" id="addItem11" onclick="document.getElementById('addItemForm11').style.display='';
                document.getElementById('addItem11').style.display='none'; return false">Add Item</button>
            </div>

            <div id="addItemForm11" style="display:none">
                <hr>
                <div class="form-group">
                    <label for="orderItem11">Order Item 11</label>
                    <select name="orderItem11" id="orderItem11" class="form-control" >
                        <option>Samba</option>
                        <option>Nadu</option>
                        <option>Red Samba</option>
                        <option>Red Nadu</option>
                        <option>Kiri Samba</option>
                        <option>Suvandal</option>
                        <option>Kekulu Samba</option>
                        <option>Sudu Kekulu</option>
                        <option>Kekulu</option>
                        <option>Red Kekulu</option>
                        <option>Kekulu Kiri</option>
                    </select>
                </div>
                <br>
                <div class="form-inline">
                    <div class="form-group">
                        <label for="quantity11">Quantity</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="quantity11" placeholder="Quantity" name="quantity11">
                            <div class="input-group-addon">kg</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unitPrice11">Unit Price</label>
                        <div class="input-group">
                            <div class="input-group-addon">Rs</div>
                            <input type="number" class="form-control" id="unitPrice11" placeholder="Unit price" name="unitPrice11">
                        </div>
                    </div>
                    <br><br>
                </div>
                <br>

            </div>
            <br>
            <button type="submit" class="btn btn-primary">Create Order</button>
            <input  type="hidden" name="_token" value="{{Session::token()}}">

        </form>
        <br><br>

        <br><br>

    </div>

@endsection
