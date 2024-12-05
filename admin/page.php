<?php

/*
Categoreis Type  Add | Dellet | 
*/

$action= isset($_GET["do"]) ? $_GET["do"] : "MANAGE";

switch ($action) {
    case 'MANAGE':
        {echo "Page Manage <a href='?do=ADD'>+++</a>"; 
            break;
        }
    
        case 'ADD':
            {echo "Is Page Add"; 
                break;
            }
        
            case 'DELETE':
                {echo "Is Page DELETE"; 
                    break;
                }
            
    default:
    echo "Is Error No page ";  
        break;
}