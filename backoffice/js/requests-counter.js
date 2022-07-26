$(document).ready(function() {


  
    setInterval(function() {

        ////////////////////////////////////////ACCOUNTING
        $.post("codes/counter.php",
        {data:'get'},function(data){
     
            //pending payments
            if(data>0){
                    // console.log(data);
                $(".ctr_pendingpayment").addClass('badge-danger');
                $(".ctr_pendingpayment").text(data);
           
            }else{
                $(".ctr_pendingpayment").removeClass('badge-danger');
                $(".ctr_pendingpayment").text('');
            }
        });
        //acknowledged payments
        $.post("codes/counter.php",
        {data2:'get'},function(data2){
     
            if(data2>0){
                    //console.log(data2);
                $(".ctr_rcvdpayment").addClass('badge-danger');
                $(".ctr_rcvdpayment").text(data2);
           
            }else{
                $(".ctr_rcvdpayment").removeClass('badge-danger');
                $(".ctr_rcvdpayment").text('');
            }
        });
        //for receipt payments
        $.post("codes/counter.php",
        {data3:'get'},function(data3){
     
            if(data3>0){
                    // console.log(data3);
                $(".ctr_for_receipt").addClass('badge-danger');
                $(".ctr_for_receipt").text(data3);
           
            }else{
                $(".ctr_for_receipt").removeClass('badge-danger');
                $(".ctr_for_receipt").text('');
            }
        });

        //total requests
        $.post("codes/counter.php",
        {data4:'get'},function(data4){
            //console.log(data4)  ;
            if(data4>0){
                    // console.log(data3);
                $(".ctr_total_reqpay").addClass('badge-danger');
                $(".ctr_total_reqpay").text(data4);
           
            }else{
                $(".ctr_total_reqpay").removeClass('badge-danger');
                $(".ctr_total_reqpay").text('');
            }
        });

        //pending student account registrations
        $.post("codes/counter.php",
        {data5:'get'},function(data5){
            //console.log(data4)  ;
            if(data5>0){
                    // console.log(data3);
                $(".ctr_total_reg").addClass('badge-danger');
                $(".ctr_total_reg").text(data5);
           
            }else{
                $(".ctr_total_reg").removeClass('badge-danger');
                $(".ctr_total_reg").text('');
            }
        });




        ///////////////////////////////////DEAN
    //sidebar counter for assessments


       //dashboard counter for assessed students
       $.post("codes/counter.php",
       {data7:'get'},function(data7){
       
           if(data7>0){
                //    console.log(data7);
               $(".assessed_students").text(data7.toLocaleString());
           }else{
              
                $(".assessed_students").text("0");
           }
       });



       //dashboard counter for pending payments
       $.post("codes/counter.php",
       {data8:'get'},function(data8){
       
           if(data8>0){
                //    console.log(data7);
               $(".pending_payments").text(data8.toLocaleString());
           }else{
              
                $(".pending_payments").text("0");
           }
       });

         //dashboard counter for acknowledged payments
         $.post("codes/counter.php",
         {data9:'get'},function(data9){
         
             if(data9>0){
                  //    console.log(data7);
                 $(".received_payments").text(data9.toLocaleString());
             }else{
                
                  $(".received_payments").text("0");
             }
         });

           //dashboard counter for acknowledged payments
           $.post("codes/counter.php",
           {data10:'get'},function(data10){
           
               if(data10>0){
                    //    console.log(data7);
                   $(".for_receipt").text(data10.toLocaleString());
               }else{
                  
                    $(".for_receipt").text("0");
               }
           });

          //dashboard counter for acknowledged payments
           $.post("codes/counter.php",
           {data11:'get'},function(data11){
           
               if(data11>0){
                    //    console.log(data7);
                   $(".verified").text(data11.toLocaleString());
               }else{
                  
                    $(".verified").text("0");
               }
           });

           //sidebar counter for pending registrations
           $.post("codes/counter.php",
           {data12:'get'},function(data12){
           
               if(data12>0){
                    //    console.log(data7);
                   $(".pendingusers").text(data12.toLocaleString());
               }else{
                  
                    $(".pendingusers").text("");
                   
               }
           });
              //dashboard counter for total registered students
              $.post("codes/counter.php",
              {data13:'get'},function(data13){
              
                  if(data13>0){
                  
                       //    console.log(data7);
                      $(".accepted").text(data13.toLocaleString());
                  }else{
                     
                       $(".accepted").text("0");
                  }
              });

              //sidebar counter for clearance request
              $.post("codes/counter.php",
              {data14:'get'},function(data14){
              
                  if(data14>0){
                       //    console.log(data7);
                      $(".ctr_clearance").text(data14.toLocaleString());
                  }else{
                     
                       $(".ctr_clearance").text("");
                  }
              });

              
              //sidebar counter for enrollment
              $.post("codes/counter.php",
              {data15:'get'},function(data15){
              
                  if(data15>0){
                           //console.log(data15);
                      $(".ctr_enrollment").text(data15.toLocaleString());
                  }else{
                     
                       $(".ctr_enrollment").text("");
                     
                  }
              });

               //sidebar counter for request of documents
               $.post("codes/counter.php",
               {data16:'get'},function(data16){
               
                   if(data16>0){
                            //console.log(data16);
                       $(".ctr_reqdocu").text(data16.toLocaleString());
                   }else{
                      
                        $(".ctr_reqdocu").text("");
                     
                   }
               });

                //sidebar counter for request of grades
                $.post("codes/counter.php",
                {data17:'get'},function(data17){
                
                    if(data17>0){
                             //console.log(data17);
                        $(".ctr_gradereq").text(data17.toLocaleString());
                    }else{
                       
                         $(".ctr_gradereq").text("");
                   
                    }
                });

                      //dashboard counter for total registered students
              $.post("codes/counter.php",
              {data18:'get'},function(data18){
              
                  if(data18>0){
                  
                       //    console.log(data7);
                      $(".staff_registrar").text(data18.toLocaleString());
                  }else{
                     
                       $(".staff_registrar").text("0");
                  }
              });

              
                      //dashboard counter for total upcoming events
                      $.post("codes/counter.php",
                      {data19:'get'},function(data19){
                      
                          if(data19>0){
                          
                               //    console.log(data7);
                              $(".up_events").text(data19.toLocaleString());
                          }else{
                             
                               $(".up_events").text("0");
                          }
                      });


                        //dashboard counter for total registrar office tasks
                        $.post("codes/counter.php",
                        {data20:'get'},function(data20){
                           
                            if(data20>0){
                                
                                 //    console.log(data7);
                                $(".tasks").text(data20.toLocaleString());
                            }else{
                                alert (data20)
                                 $(".tasks").text("0");
                            }
                        });


                     //sidebar counter for pending request of documents
                    $.post("codes/counter.php",
                    {data21:'get'},function(data21){
               
                   if(data21>0){
                            //console.log(data16);
                       $(".ctr_p_reqdocu").text(data21.toLocaleString());
                   }else{
                      
                        $(".ctr_p_reqdocu").text("");
                       
                   }
               });

               //sidebar counter for cleared request of documents
               $.post("codes/counter.php",
               {data22:'get'},function(data22){
          
              if(data22>0){
                       //console.log(data16);
                  $(".ctr_c_reqdocu").text(data22.toLocaleString());
              }else{
                 
                   $(".ctr_c_reqdocu").text("");
                  
              }
          });

             //sidebar counter for total request of documents
             $.post("codes/counter.php",
             {data23:'get'},function(data23){
        
            if(data23>0){
                     //console.log(data16);
                $(".ctr_total_reqdocu").text(data23.toLocaleString());
            }else{
               
                 $(".ctr_total_reqdocu").text("");
           
            }
        });


              //sidebar counter for requirements checking
              $.post("codes/counter.php",
              {data24:'get'},function(data24){
         
             if(data24>0){
                      //console.log(data16);
                 $(".ctr_checkreq").text(data24.toLocaleString());
             }else{
                
                  $(".ctr_checkreq").text("");
            
             }
         });

               //sidebar counter for freshman-registrations
               $.post("codes/counter.php",
               {data25:'get'},function(data25){
          
              if(data25>0){
                       //console.log(data16);
                  $(".ctr_regfreshman").text(data25.toLocaleString());
              }else{
                 
                   $(".ctr_regfreshman").text("");
             
              }
          });

           //sidebar counter for transferee-registrations
           $.post("codes/counter.php",
           {data26:'get'},function(data26){
      
          if(data26>0){
                   //console.log(data16);
              $(".ctr_regtrans").text(data26.toLocaleString());
          }else{
             
               $(".ctr_regtrans").text("");
         
          }
      });

 





    },1000);
    

});