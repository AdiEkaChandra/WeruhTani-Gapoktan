@extends('admin.layout')

@section('content')
<div class="container text-center">
    <h1 class="mt-4">Monitor IoT - Suhu dan Kelembaban</h1>
    <p class="text-muted">Realtime Monitoring Data IoT</p>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Terkini</h5>
            <div class="row mt-4">
                <div class="col">
                    <h6><i class="fas fa-thermometer-half text-danger"></i> Suhu</h6>
                    <h1 id="temperature">-- °C</h1>
                </div>
                <div class="col">
                    <h6><i class="fas fa-tint text-primary"></i> Kelembaban</h6>
                    <h1 id="humidity">-- %</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MQTT Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js"></script>
<script>
    const client = new Paho.MQTT.Client("mqtt.my.id", Number(8083), "webClient");
    const topic = "kel5/proyek2/tubes";

    client.onConnectionLost = function (responseObject) {
        console.error("Connection lost:", responseObject.errorMessage);
    };

    client.onMessageArrived = function (message) {
        try {
            const data = JSON.parse(message.payloadString);
            document.getElementById("temperature").innerText = `${data.temperature} °C`;
            document.getElementById("humidity").innerText = `${data.humidity} %`;
        } catch (e) {
            console.error("Error parsing message:", e);
        }
    };

    client.connect({
        onSuccess: function () {
            console.log("Connected to MQTT broker");
            client.subscribe(topic);
        },
        onFailure: function (error) {
            console.error("Connection failed:", error);
        }
    });
</script>
@endsection
