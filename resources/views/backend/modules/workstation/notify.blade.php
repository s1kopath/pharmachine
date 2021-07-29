<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Emergency !!</h1>
    {{-- @dd($issueMsg); --}}
    {{-- <p>Machine {{ $notifyMsg ->status }}</p> --}}

<p>Dear Mr. X,</p><br>
<p>This mail is to notify you that the workstation has stopped working on {{ $issueMsg->created_at }}. We immediately require your services. </p>
<br>
<p>Machine name: {{ $notifyMsg->name }}</p>
<p>Details: {{ $notifyMsg->description }}</p>
<p>Manufacturer: {{ $notifyMsg->manufacturer }}</p>
<p>Machine output: {{ $notifyMsg->output }} per min</p>
<p>Reported by: {{ $issueMsg->reportWorker->workerUser->name }}</p>
<p>Issue: {{ $issueMsg->note }}</p>
<br>
<p>Sincerely,</p>
<br>
<p>Production Manager,</p>
<p>Ergon Pharmaceuticals Ltd,</p>
<p>House # 04 (3rd Floor), Mohakhali C/A, Dhaka-1212, Bangladesh.</p>
<p>Tel : +02 989 42 92.</p>




</body>

</html>
