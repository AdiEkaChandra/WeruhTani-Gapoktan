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
                    <h6><i class="fas fa-thermometer-half text-danger"></i> Suhu Gabah</h6>
                    <h1 id="grainTemperature">-- °C</h1>
                </div>
                <div class="col">
                    <h6><i class="fas fa-water text-primary"></i> Kelembaban Gabah</h6>
                    <h1 id="grainMoisture">-- %</h1>
                </div>
                <div class="col">
                    <h6><i class="fas fa-thermometer text-success"></i> Suhu Ruangan</h6>
                    <h1 id="roomTemperature">-- °C</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MQTT Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js"></script>
<script>
    // Konfigurasi broker MQTT dan topik
    const mqttHost = "mqtt.my.id";       // Host broker MQTT
    const mqttPort = 8083;              // Port untuk WebSocket MQTT
    const topic = "iot/sensor/datagabah"; // Topik yang sesuai dengan perangkat IoT

    // Inisialisasi klien MQTT
    const client = new Paho.MQTT.Client(mqttHost, Number(mqttPort), "webClient_" + Math.random().toString(16).substr(2, 8));

    // Callback saat koneksi ke broker terputus
    client.onConnectionLost = function (responseObject) {
        console.error("Connection lost:", responseObject.errorMessage);
    };

    // Callback saat pesan diterima dari topik
    client.onMessageArrived = function (message) {
        console.log("Message received:", message.payloadString);
        try {
            // Parsing payload JSON
            const data = JSON.parse(message.payloadString);

            // Perbarui elemen HTML dengan data yang diterima
            document.getElementById("grainTemperature").innerText = `${data.GrainTemperature.toFixed(1)} °C`;
            document.getElementById("grainMoisture").innerText = `${data.GrainMoisture.toFixed(1)} %`;
            document.getElementById("roomTemperature").innerText = `${data.RoomTemperature.toFixed(1)} °C`;
        } catch (e) {
            console.error("Error parsing message:", e);
        }
    };

    // Koneksi ke broker MQTT
    client.connect({
        onSuccess: function () {
            console.log("Connected to MQTT broker");
            client.subscribe(topic);
            console.log("Subscribed to topic:", topic);
        },
        onFailure: function (error) {
            console.error("Connection failed:", error);
        }
    });
</script>
@endsection
