<?php

class AdminController {

    public function formSubmit(Request $request) {
        response()->json([$request->all()]);
    }




}
