<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<div style="display:flex;flex-direction:column;width:100%;height:100%;">

    <h3 class="text-center text-light">Quản lí Thiết bị</h3>

<div class="row" style="width:100%;height:100%;color:#333;">

    <div class="col col-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">Cap Phat Thiet Bi NV</h3>
            </div>
        <div class="card-body">
        <div class="d-flex ">
            <!-- form here -->
            <form class="w-100" >
                <div class="row">
                    <div class="col col-6">
                        <!-- fint id NV -->
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Enter ID" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                        </div>
                        <!-- info NV -->
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Name</span>
                            <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col col-6">
                        <!-- info NV -->
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Position</span>
                            <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Departments</span>
                            <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>
        <!-- table cap phat thiet bi -->
        <div class="" style="overflow-y:scroll;height:360px">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>
                      <button type="button" class="btn btn-danger">Danger</button>
                  </td>
    
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                  <td>
                      <button type="button" class="btn btn-danger">Danger</button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                  <td>
                      <button type="button" class="btn btn-danger">Danger</button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                  <td>
                      <button type="button" class="btn btn-danger">Danger</button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                  <td>
                      <button type="button" class="btn btn-danger">Danger</button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                  <td>
                      <button type="button" class="btn btn-danger">Danger</button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                  <td>
                      <button type="button" class="btn btn-danger">Danger</button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                  <td>
                      <button type="button" class="btn btn-danger">Danger</button>
                  </td>
                </tr>
              </tbody>
            </table>
    </div>
    </div>
    
</div>
</div>
<div class="col col-6">
<div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">Loai Thiet Bi</h3>
            </div>
        <div class="card-body">
        <div class="d-flex">
            <!-- form  -->
            <form class="w-100">
                    <div class="row">
                        <div class="col col-12">
                            <!-- cbbox loai thiet bi -->
                            <select class="form-select mb-3" aria-label="Default select example">
                                <option selected>Loai Thiet Bi here</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Chac Nhap Ten Thiet bi :)))" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                            </div>
                        </div>
                </div>
            </form>
        </div>
        <!-- table cap phat thiet bi -->
        <div  style="overflow-y:scroll;height:360px">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
                  <!-- button control here -->
                  <th scope="col">
                       
                  </th>
    
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <th scope="col">
                        <button class="btn btn-primary">Khong biet</button>
                  </th>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <th scope="col">
                        <button class="btn btn-primary">Khong biet</button>
                  </th>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <th scope="col">
                        <button class="btn btn-primary">Khong biet</button>
                  </th>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <th scope="col">
                        <button class="btn btn-primary">Khong biet</button>
                  </th>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <th scope="col">
                        <button class="btn btn-primary">Khong biet</button>
                  </th>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <th scope="col">
                        <button class="btn btn-primary">Khong biet</button>
                  </th>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <th scope="col">
                        <button class="btn btn-primary">Khong biet</button>
                  </th>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <th scope="col">
                        <button class="btn btn-primary">Khong biet</button>
                  </th>
                </tr>
              </tbody>
            </table>

        </div>
    </div>
    </div>

</div>
<?= $this->endSection() ?>
