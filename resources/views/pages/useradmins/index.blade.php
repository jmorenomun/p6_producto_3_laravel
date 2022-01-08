@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col text-center">
      <img src="<?php echo constant('URLROOT')  . '/public/assets/icons/admin-sm.png' ?>" />
    </div>
  </div>

        <div class="row px-3">
          <div class="col">
          <div class="card card-body bg-light mt-5">
            <!-- Header row teachers -->
            <div class="row">
              <div class="col-6">
                <h2 class="mb-3">Teachers <?php echo '('.sizeOf($data['teachers']).')'; ?></h2>
              </div>
              <div class="col-6 text-right">
                <a class="btn btn-success btn-md" href="<?php echo constant('URLROOT') . '/teachers/create' ?>">Add New</a>
              </div>
            </div>

              <table class="table table-hover table-sm">
                <thead >
                    <tr>
                        <th scope="col">NIF</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th></th>
                    </tr>
                </thead>
                <?php
                  foreach($data['teachers'] as $row){
                    ?>
                  <tr scope="row">
                    <tbody>
                      <td><?php echo $row->nif; ?></td>
                      <td><?php echo $row->name; ?></td>
                      <td><?php echo $row->surname; ?></td>
                      <td>
                        <a class="btn btn-info btn-sm" href="<?php echo constant('URLROOT') . '/teachers/' . $row ->id_teacher ?>">View</a>
                      </td>
                    </tbody>
                  </tr>
                <?php } ?>
              </table>
          </div>
          </div>
          </div>


          <div class="row px-3">
          <div class="col">
          <div class="card card-body bg-light mt-5">
            <!-- Header row courses -->
            <div class="row">
              <div class="col-6">
                <h2 class="mb-3">Courses <?php echo '('.sizeOf($data['courses']).')'; ?></h2>
              </div>
              <div class="col-6 text-right">
                <a class="btn btn-success btn-md" href="<?php echo constant('URLROOT') . '/courses/create' ?>">Add New</a>
              </div>
            </div>
              <table class="table table-hover table-sm">
                <thead>
                  <tr>
                      <th>Name</th>
                      <th>Description</th>
                      <th></th>
                  </tr>
                </thead>
                <tbody>
              <?php
                foreach($data['courses'] as $row){
                  ?>
                  <tr>
                      <td><?php echo $row->name; ?></td>
                      <td><?php echo $row->description; ?></td>
                      <td><a class="btn btn-info btn-sm" href="<?php echo constant('URLROOT') . '/courses/' . $row ->id_course ?>">View</a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
          </div>
          </div>
        </div>

        <div class="row px-3">
          <div class="col">
          <div class="card card-body bg-light mt-5">
            <!-- Header row classes -->
            <div class="row">
              <div class="col-6">
                <h2 class="mb-3">Classes <?php echo '('.sizeOf($data['class']).')'; ?></h2>
              </div>
              <div class="col-6 text-right">
                <a class="btn btn-success btn-md" href="<?php echo constant('URLROOT') . '/lessons/create' ?>">Add New</a>
              </div>
            </div>
            <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th>Class</th>
                    <th>Tag</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
              foreach($data['class'] as $row){
                ?>
                <tr>
                    <td><?php echo $row->class; ?></td>
                    <td style="background-color: '#<?php echo $row->color; ?>';"></td>
                    <td><a class="btn btn-info btn-sm" href="<?php echo constant('URLROOT') . '/lessons/' . $row ->id_class ?>">View</a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          </div>
        </div>

@endsection
