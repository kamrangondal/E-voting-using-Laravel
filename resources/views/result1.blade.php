@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as admin!') }}
                    <br>
                    <a href="http://localhost/e-voting/public/vadmin" class="btn btn-outline-primary btn-lg" role="button" aria-pressed="true">Move to main Admin Panel</a>
                    <br><br>
                    <h3 style="text-align: center">RESULTS</h3>
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "e-voting";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        }

                        $sql11 = "SELECT * FROM Elections";
                        $result11 = $conn->query($sql11);

                        $sql22 = "SELECT * FROM Positions";
                        $result22 = $conn->query($sql22);

                        $sql1 =  "SELECT * FROM Nominees";
                        $result1 = $conn->query($sql1);

                        $sql = "SELECT * FROM Voters";
                        $result = $conn->query($sql);
                        $count1=0;
                        $count2=0;
                        $count3=0;
                        $count4=0;

                        $count5=0;
                        $count6=0;
                        $count7=0;
                        $count8=0;

                        if ($result11->num_rows > 0) {
                            // output data of each row
                            while($row501 = $result11->fetch_assoc()) {
                                echo "<br> ID: ". $row501["id"]. " -     Name:   ". $row501["name"];
                                $count1++;
                            }
                        } else {
                            echo "0 results";
                        }

                        echo "<br>"."Total Elections: ".$count1."<br>";

                        if ($result22->num_rows > 0) {
                            // output data of each row
                            while($row = $result22->fetch_assoc()) {
                                echo "<br> ID: ". $row["id"]. " -     Name:   ". $row["name"]. " -     Name of Election ID:   ". $row["election_id"];
                                $count2++;

                            }
                        } else {
                            echo "0 results";
                        }

                        echo "<br>"."Total Positions: ".$count2."<br>";

                        if ($result1->num_rows > 0) {
                            // output data of each row
                            while($row = $result1->fetch_assoc()) {
                                echo "<br> ID: ". $row["id"]. " -     Name:   ". $row["name"]. " -     Position_ID:  " . $row["position_id"]. " -     Election_ID:  " . $row["election_id"];
                                $count3++;

                            }
                        } else {
                            echo "0 results";
                        }

                        echo "<br>"."Total Nominees: ".$count3."<br>";


                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<br> ID: ". $row["id"]. " -     Name:   ". $row["name"]. " -     Special_ID:  " . $row["special_id"]. " -     Election_ID:  " . $row["election_id"]. " -     Position_ID:  " . $row["position_id"]. " -     Nominee_ID:  " . $row["nominee_id"];
                                $count4++;

                            }
                        } else {
                            echo "0 results";
                        }

                        echo "<br>"."Total Voters: ".$count4."<br>";


                        // $win = "SELECT COUNT(id) FROM Voters WHERE nominee_id='1'";

                        // if ($result101 = mysqli_query($conn, $win)) {
                        
                        //     // Return the number of rows in result set
                        //     $rowcount101 = mysqli_num_rows( $result101 );
                            
                        //     // Display result
                        //     printf("Total rows in this table : %d\n", $rowcount101);
                        // }

                        // $win2 = "SELECT COUNT(id) FROM Voters WHERE nominee_id='2'";

                        // if ($result102 = mysqli_query($conn, $win2)) {
                        
                        //     // Return the number of rows in result set
                        //     $rowcount102 = mysqli_num_rows( $result102 );
                            
                        //     // Display result
                        //     printf("Total rows in this table : %d\n", $rowcount102);
                        // }

                        // $win3 = "SELECT COUNT(id) FROM `voters` WHERE nominee_id='3'";

                        // if ($result103 = mysqli_query($conn, $win3)) {
                        
                        //     // Return the number of rows in result set
                        //     $rowcount103 = mysqli_num_rows( $result103 );
                            
                        //     // Display result
                        //     printf("Total rows in this table : %d\n", $rowcount103);
                        // }
  
                        
                        $conn->close();
                    ?>

                    <br><br><h6 style="text-align: center">search Nominee for more detail</h6>
                    
                    <!--anees stuff starts from here!-->
                    <form action="{{route('result1.search')}}" method="post">
                    @csrf
                        <br>
                        <div class="form-group">
                            <label class="sr-only">Keywords</label>
                            <input type="text" class="form-control" name="keywords" placeholder="keywords: nominee name">
                        </div>

                        <div class="form-group">
                            <label class="sr-only">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="keywords: nominee name">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                    @isset($nominees)

                    @if(count($nominees) > 0)
                        <!-- plot 1 -->
                        @foreach($nominees as $nominee)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card plot-preview">
                                <div class="card-img-overlay">
                                    <h2>
                                    <span class="badge badge-secondary text-primary">Searched Nominee</span>
                                    </h2>
                                </div><br><br>
                            <div class="card-body">
                                <div class="plot-heading text-center">
                                    <h4 class="text-primary">{{ $nominee ->name }} </h4>
                                    </div>
                                <hr>
                                <div class="plot-heading text-center">
                                <!--<h4 class="text-primary">{{ $nominee ->position_id }} </h4>-->
                                <h4 class="text-primary">Position ID: {{$nominee -> position_id}} </h4>
                                </div>
                            <hr>
                                <div class="plot-heading text-center">
                                <h4 class="text-primary">election ID: {{ $nominee ->election_id }} </h4>
                                </div>
                            <hr>
                            <div class="plot-heading text-center">
                                <h4 class="text-primary">Total Votes: <?php $nominee_id = ($nominee->id);
                                                                        
                                                                        
                                                                            $counter = DB::table('voters')->where('nominee_id', $nominee_id)->count();
                                                                            if($counter != 0){
                                                                                echo $counter;
                                                                            }
                                                                            
                                                                        
                                                                            
                                                                        ?> </h4>
                                </div>
                            <hr>
                                                  
                        @endforeach
                        @endif

                            </div>
                        </div>
                    </section>
                    @endisset

                        <br><br>

                    <?php $nominee_id = 1;
                    $win = array();
                    $gg11 = DB::table('voters')->count();
                    while($nominee_id <= $gg11){
                        $counter = DB::table('voters')->where('nominee_id', $nominee_id)->count();
                        if($counter != 0){
                            echo "<br>Total votes for nominee having ID:". $nominee_id."      is  ".$counter;
                        }
                        array_push($win,$counter);
                        $nominee_id++;
                    }
                    
                    echo "<br>";
                    print_r($win);
                    echo "<br><br><br>Winner will be having maxing votes, so maximum votes are: ".max($win);
                    ?>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
