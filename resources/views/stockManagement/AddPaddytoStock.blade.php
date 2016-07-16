<!DOCTYPE HTML>
<html>
<head></head>
<body>
    <script src={{URL::to('src/js/lib/jquery.canvasjs.min.js')}}></script>
    <script type="text/javascript">

        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                title:{
                    text: "My First Chart in CanvasJS"
                },
                data: [
                    {
                        // Change type to "doughnut", "line", "splineArea", etc.
                        type: "column",
                        dataPoints: [
                            { label: "apple",  y: 90  },
                            { label: "orange", y: 15  },
                            { label: "banana", y: 25  },
                            { label: "mango",  y: 30  },
                            { label: "grape",  y: 28  }
                        ]
                    }
                ]
            });
            chart.render();
        }
    </script>

<div id="chartContainer" style="height: 530px; width: 100%;"></div>
</body>
</html>