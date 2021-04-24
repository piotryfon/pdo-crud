<?php

class Equipment
        {
            protected $eq_id;
            protected $type;
            protected $NI;
            protected $description;
            protected $room;
            protected $imie;
            protected $nazwisko;
            protected $login_pracownika;

            public function getEquipmentInfo()
            {
                return "
                    <tr>
                        <td>$this->type</td>
                        <td>$this->NI</td>
                        <td>$this->description</td>
                        <td>$this->room</td>
                        <td>$this->imie</td>
                        <td>$this->nazwisko</td>
                    </tr>
                ";
            }
        
            public function UpdateEquipment()
            {
                return "
                <form method='POST'>
                    <div class='row'>
                        <input class='invisible' name='id' value='$this->eq_id'/>
                        <div class='mb-3 col-sm-4'>
                            <label for='type' class='form-label'>Rodzaj</label>
                            <input class='form-control' name='type' value='$this->type'/>
                        </div>
                        <div class='mb-3 col-sm-6'>
                            <label for='ni' class='form-label'>Numer inwentarzowy</label>
                            <input class='form-control' name='ni' value='$this->NI'/>
                        </div>
                        <div class='mb-3 col-sm-2'>
                            <label for='room' class='form-label'>Pokój</label>
                            <input class='form-control' name='room' value='$this->room'/>
                        </div>
                        <div class='mb-3 col-sm-12'>
                            <label for='description' class='form-label'>Opis</label>
                            <input class='form-control' name='description' value='$this->description'/>
                        </div>
                    </div>
                    <button class='btn btn-outline-primary' type='submit' name='edit'>Edytuj sprzęt</button>
                </form><br><hr>
                ";
            }
            public function AssignUser()
            {
                return "
                <form method='POST'>
                    <div class='row'>
                        <input class='form-control invisible' readonly name='eq_id' value='$this->eq_id'/>
                        <div class='mb-3 col-sm-4'>
                            <label for='type' class='form-label'>Rodzaj</label>
                            <input class='form-control' readonly name='type' value='$this->type'/>
                        </div>
                        <div class='mb-3 col-sm-6'>
                            <label for='ni' class='form-label'>Numer inwentarzowy</label>
                            <input class='form-control' readonly name='ni' value='$this->NI'/>
                        </div>
                        <div class='mb-3 col-sm-2'>
                            <label for='room' class='form-label'>Pokój</label>
                            <input class='form-control' readonly name='room' value='$this->room'/>
                        </div>
                        <div class='mb-3 col-sm-12'>
                            <label for='description' class='form-label'>Opis</label>
                            <input class='form-control' readonly name='description' value='$this->description'/>
                        </div>
                        <div class='mb-3 col-sm-12'>
                            <label for='login' class='form-label'>Login</label>
                            <input class='form-control' name='login' value='$this->login_pracownika'/>
                        </div>
                    </div>
                    <button class='btn btn-outline-primary' type='submit' name='assign'>Przypisz sprzęt</button>
                </form><br><hr>
                ";
            }
        }
?>