<div class="time-vps-wait">
        <?php for($i = 0; $i <20; $i++): ?>
        <div class="wait-iten"> 
            <div class="iten-inffo-number">
                <div class="number-time">
                    <span>10m</span>
                </div>
                <div class="number-percentage">
                    <span>50%</span>
                </div>
            </div>
            <div class="iten-percentage-bar">
                <div class="bar-inffo">
                    <span>111.111.111</span>
                </div>
                <div class="bar-bc"> 
                    <div class="bar">
                        <div class="bar-inside">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>
<style>
    .time-vps-wait{
    position: fixed;
    z-index: 2;
    width: 250px;
    height: auto;
}
</style>