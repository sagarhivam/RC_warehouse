<?php
    
//write_log(__FILE__,__LINE__);

  //write_log("DEBUG directory.php");
    
    /*
     *  0  Login
     *  1  Landing?
     *  9  Password Change
     *
     *  30 Activity Monitor *******************************
     *  31 Record Search **********************************
     *  32 Display Records
     *  33 Box Search *************************************
     *  34 Box Details
     *
     *  40 Working Boxes (Non-RC) *************************
     *  41 New Box (Non-RC)
     *  42 Add Records / Complete Box (Non-RC)
     *  43 Edit Box (Non-RC)
     *  44 Transfer Box (Non-RC) - NEEDS CREATED
     *
     *  45 Generate RC Box Labels *************************
     *
     *  51 Devices (View Devices) *************************
     *  52 Add Device (Create)
     *  53 Add Device (Confirm)
     *  54 Edit Device
     *  55 OPEN
     *
     *  61 Storage Locations ******************************
     *  62 View Warehouse Rows
     *  63 Add Warehouse Rows
     *  64 View Warehouse Row Details
     *  65 Add Bays / Shelves to Warehouse
     *
     *  67 View Warehouses ********************************
     *  68 Add Warehouse
     *  69 Edit Warehouse
     *  
     *
     *  71 View Outlets (Non-WH) **************************
     *  72 Add Outlet (Non-WH)
     *  73 Edit Outlet (Non-WH)
     *
     *  74 Select Non-WH Locations for Label Reprint ******
     *  75 Select WH Locations for Label Reprint
     *  76 Reprint Box Label
     *  77 Access Queued Printfiles
     *
     *
     *  81 View Properties ********************************
     *  82 Add Property
     *  83 Edit Property
     *
     *  84 View Departments *******************************
     *  85 Add Department
     *  86 Edit Department
     *
     *  87 View Record Types ******************************
     *  88 Add Record Type
     *  89 Edit Record Type
     *  
     *  
     *  91 View User Groups *******************************
     *  92 Add User Group
     *  93 Edit User Group
     *
     *  96 View Users *************************************
     *  97 Add User Group
     *  98 Edit User Group
     *
     */
    
     /*
      *
      * 30 Activity Monitor
      * 31 Record Search
      * 33 Box Search
      *
      * 40 Create Boxes
      * 45 RC Box Labels
      * 74 Label Reprints
      *
      * 67 Warehouses
      * 61 Warehouse Storage
      * 71 Outlets
      * 81 Casinos
      * 84 Departments
      * 87 Record Types
      * 91 User Groups
      * 96 Users
      * 
      */
     
     // PAGE NUMBERS 0-9 RESERVED FOR ALL LOGGED IN USERS.  DEFAULT PERMISSIONS ALWAYS GRANTED WHEN CREATING OR UPDATING USERGROUPS.
     
     $menugroup[1] = 'Records';
     $menugroup[2] = 'Boxes & Labels';
     $menugroup[8] = 'Manage Requests';
     $menugroup[9] = 'Administration';
     
     // $menuitem[PAGE] = array([PageID],[MenuGroup#],[MenuText],[GrantsAccessTo|GrantsAccessTo][Description])
     $menuitem[1]  = array(30,1,'Activity Monitor','30','View Activity Monitor');
     $menuitem[2]  = array(31,1,'Record Search','31|32','Conduct Record Search');
     $menuitem[3]  = array(33,1,'Box History','33|34','Conduct Box Search');
     $menuitem[4]  = array(35,1,'Request Boxes','35|36|37|38|39','Box Requests');
     $menuitem[5]  = array(40,2,'Create Boxes','40|41|42|43|44','Create Boxes (Non-RC Group)');
     $menuitem[6]  = array(45,2,'RC Boxes','45|46|47','Create RC Boxes & Labels');
     $menuitem[7]  = array(74,2,'Label Reprints','74|75|76|77','Reprint Labels & Label Groups');
     $menuitem[8]  = array(96,9,'Users','96|97|98','Manage System Users');
     $menuitem[9]  = array(91,9,'User Groups','91|92|93','User Groups and Permissions');
    // $menuitem[10]  = array(51,9,'Devices','51|52|53|54|55','Authorize and Manage System Devices');
     $menuitem[11] = array(81,9,'Casinos','81|82|83','View / Add / Edit Casinos');
     $menuitem[12] = array(84,9,'Departments','84|85|86','View / Add / Edit Departments');
     $menuitem[13] = array(87,9,'Record Types','87|88|89','Manage Record Types');
     $menuitem[14] = array(67,9,'Warehouses','67|68|69','View / Add / Edit Warehouses');
     $menuitem[15] = array(61,9,'Warehouse Storage','61|62|63|64|65','Manage Warehouse Storage (Rows, Bays, Shelves)');
     $menuitem[16] = array(71,9,'Field Locations','71|72|73','View / Add / Edit Field Locations');
     $menuitem[17] = array(100,8,'Requests','100|101|102|103|104','Manage Records Requests');
     $menuitem[10]  = array(51,8,'Pick List','51|52|53|54|55','Boxes for pick up');
     $menuitem[18]  = array(110,8,'Destroy Data','110','Boxes reaching there destroy date');
     $menuitem[19]  = array(111,8,'Box Return','111','Pick-up request');    

     $usermenupermissionsarray = explode('|',$userpermissions);
     $RCW_MENU = '';
     $currentmenugroup = -1;
     foreach($menuitem as $key=>$value) {
        if(in_array($value[0],$usermenupermissionsarray)) {
            if($currentmenugroup != $value[1]) {
                if($currentmenugroup != -1) {$RCW_MENU .= '<br/>' . PHP_EOL; }
                $currentmenugroup = $value[1];
                $RCW_MENU .= '<h3>' . $menugroup[$currentmenugroup] . '</h3>' . PHP_EOL;
            }
            $RCW_MENU .= '<a href="index.php?pid=' . $value[0] . '">-&nbsp' . $value[2] . '</a>' . PHP_EOL;
        }
     }
     
?>
