<script>
export default {
    
}
</script>

<template>
       <div class="card">
                                    <div class="card-header align-items-center border-0 d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Trading</h4>
                                        <div class="flex-shrink-0">
                                            <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#buy-tab" role="tab" aria-selected="false">Buy</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#sell-tab" role="tab" aria-selected="true">Sell</a>
                                                </li>
                                            </ul><!-- end ul -->
                                        </div>
                                    </div><!-- end cardheader -->
                                    <div class="card-body p-0">
                                        <div class="tab-content p-0">
                                            <div class="tab-pane active" id="buy-tab" role="tabpanel">
                                                <div class="p-3 bg-soft-warning">
                                                    <div class="float-end ms-2">
                                                        <h6 class="text-warning mb-0">USD Balance : <span class="text-dark">$12,426.07</span></h6>
                                                    </div>
                                                    <h6 class="mb-0 text-danger">Buy Coin</h6>
                                                </div>
                                                <div class="p-3">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label>Currency :</label>
                                                                <select class="form-select">
                                                                    <option>BTC</option>
                                                                    <option>ETH</option>
                                                                    <option>LTC</option>
                                                                </select>
                                                            </div>
                                                        </div><!-- end col -->
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label>Payment Method :</label>
                                                                <select class="form-select">
                                                                    <option>Wallet Balance</option>
                                                                    <option>Credit / Debit Card</option>
                                                                    <option>PayPal</option>
                                                                    <option>Payoneer</option>
                                                                </select>
                                                            </div>
                                                        </div><!-- end col -->
                                                    </div><!-- end row -->
                                                    <div>
                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text">Amount</label>
                                                            <input type="text" class="form-control" placeholder="0">
                                                        </div>

                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text">Price</label>
                                                            <input type="text" class="form-control" placeholder="2.045585">
                                                            <label class="input-group-text">$</label>
                                                        </div>

                                                        <div class="input-group mb-0">
                                                            <label class="input-group-text">Total</label>
                                                            <input type="text" class="form-control" placeholder="2700.16">
                                                        </div>
                                                    </div>  
                                                    <div class="mt-3 pt-2">
                                                        <div class="d-flex mb-2">
                                                            <div class="flex-grow-1">
                                                                <p class="fs-13 mb-0">Transaction Fees<span class="text-muted ms-1 fs-11">(0.05%)</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <h6 class="mb-0">$1.08</h6>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mb-2">
                                                            <div class="flex-grow-1">
                                                                <p class="fs-13 mb-0">Minimum Received<span class="text-muted ms-1 fs-11">(2%)</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <h6 class="mb-0">$7.85</h6>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1">
                                                                <p class="fs-13 mb-0">Estimated Rate</p>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <h6 class="mb-0">1 BTC ~ $34572.00</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 pt-2">
                                                        <button type="button" class="btn btn-primary w-100">Buy Coin</button>
                                                    </div>
                                                </div>
                                            </div><!-- end tabpane -->

                                            <div class="tab-pane" id="sell-tab" role="tabpanel">
                                                <div class="p-3 bg-soft-warning">
                                                    <div class="float-end ms-2">
                                                        <h6 class="text-warning mb-0">USD Balance : <span class="text-dark">$12,426.07</span></h6>
                                                    </div>
                                                    <h6 class="mb-0 text-danger">Sell Coin</h6>
                                                </div>
                                                <div class="p-3">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label>Currency :</label>
                                                                <select class="form-select">
                                                                    <option>BTC</option>
                                                                    <option>ETH</option>
                                                                    <option>LTC</option>
                                                                </select>
                                                            </div>
                                                        </div><!-- end col -->
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label>Email :</label>
                                                                <input type="email" class="form-control" placeholder="example@email.com">
                                                            </div>
                                                        </div><!-- end col -->
                                                    </div><!-- end row -->
                                                    <div>
                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text">Amount</label>
                                                            <input type="text" class="form-control" placeholder="0">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text">Price</label>
                                                            <input type="text" class="form-control" placeholder="2.045585">
                                                            <label class="input-group-text">$</label>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <label class="input-group-text">Total</label>
                                                            <input type="text" class="form-control" placeholder="2700.16">
                                                        </div>
                                                    </div>  
                                                    <div class="mt-3 pt-2">
                                                        <div class="d-flex mb-2">
                                                            <div class="flex-grow-1">
                                                                <p class="fs-13 mb-0">Transaction Fees<span class="text-muted ms-1 fs-11">(0.05%)</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <h6 class="mb-0">$1.08</h6>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mb-2">
                                                            <div class="flex-grow-1">
                                                                <p class="fs-13 mb-0">Minimum Received<span class="text-muted ms-1 fs-11">(2%)</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <h6 class="mb-0">$7.85</h6>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1">
                                                                <p class="fs-13 mb-0">Estimated Rate</p>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <h6 class="mb-0">1 BTC ~ $34572.00</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 pt-2">
                                                        <button type="button" class="btn btn-danger w-100">Sell Coin</button>
                                                    </div>
                                                </div>
                                            </div><!-- end tab pane -->
                                        </div><!-- end tab pane -->
                                    </div><!-- end card body -->
                                </div><!-- end card -->
</template>