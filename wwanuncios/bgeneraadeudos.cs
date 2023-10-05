
                int ierror = 0;
                DSAde dsanun = new DSAde();
                DSAdeTableAdapters.DTAnuTableAdapter tanu = new DSAdeTableAdapters.DTAnuTableAdapter();
                tanu.FSubDUA(dsanun.DTAnu, gsDUA, gsSubDUA);

                string sypag = this.LBAñopagado.SelectedItem.ToString();

                string sycap = this.TBFechaRecibo.Text;
                sycap = sycap.Substring(0, 4);
                string syade = this.LBAñoGenerado.SelectedItem.ToString();
                decimal dyade = Convert.ToDecimal(syade);
                decimal dyade1 = dyade;
                string syade04 = syade.Substring(0, 4) + "04";

                int iyade = Convert.ToInt32(syade);
                int iyade1 = iyade;
                int iypag = Convert.ToInt32(sypag);
                int iycap = Convert.ToInt32(sycap);
                //Trace.Write("229>>>>>>>>>>>>>>");
                    foreach (DataRow arow in dsanun.DTAnu.Rows)
                {
                    string syade05 = syade04;
                    string spaso = arow["finicio"].ToString();
                    string syini = spaso.Substring(0, 4);
                    decimal dmini = Convert.ToDecimal(spaso.Substring(4, 2));
                    decimal dyini = Convert.ToDecimal(syini);
                    int iyini = Convert.ToInt32(syini);

                    if (iyini > iypag)
                    {
                        ierror = ierror + 0;
                    }
                    if (iyini > iycap)
                    {
                        ierror = ierror + 0;
                    }
                    if (iypag > iyade)
                    {
                        ierror = ierror + 1;
                    }
                }
                //Trace.Write("252>>>>>>>>>>>>>>");
                if (ierror > 0)
                {
                    Lerror_captura.Visible = true;
                    Lerror_captura.Text = "La Fecha de inicio de un Anuncio es mayor a la fecha capturada";
                    Lerror_captura.Text = "La Fecha Ultimo año Pagado es MAYOR a la de Año de Adeudos x Generar";

                }
                if (ierror < 01) //20230927 empiezo a transcribir
                {
                    //Trace.Write("262>>>>>>>>>>>>>>");
                    foreach (DataRow arow in dsanun.DTAnu.Rows)
                    {
                        dyade1 = dyade;
                        string syade05 = syade04;
                        int ifbajax = 0;
                        string scuenta;
                        string stipoanuncio;
                        decimal dbonrec = 0m;
                        decimal dbonsan = 0m;
                        decimal drezago = 0m;
                        decimal drecargo = 0m;
                        decimal dsancion = 0m;
                        decimal dvistas = 0m;
                        decimal darea = 0m;
                        decimal dfinicio;
                        decimal dyini;
                        decimal dmini;
                        decimal d_meses_acum = 0m;
                        decimal dacum_tasa = 0m;

                        scuenta = arow["cuenta"].ToString();
                        dvistas = Convert.ToDecimal(arow["vistas"].ToString());
                        stipoanuncio = arow["tipoanuncio"].ToString();
                        darea = Convert.ToDecimal(arow["area"].ToString());
                        string spaso = arow["finicio"].ToString();
                        dfinicio = Convert.ToDecimal(spaso);
                        int iyini = Convert.ToInt32(spaso.Substring(0, 4));
                        dyini = Convert.ToDecimal(iyini);
                        int imini = Convert.ToInt32(spaso.Substring(4, 2));
                        dmini = Convert.ToDecimal(imini);
                        Int64 irecof = Convert.ToInt64(arow["recof"].ToString());
                        int ifecpag = Convert.ToInt32(arow["fpago"].ToString());

                        spaso = arow["fpago"].ToString();
                        spaso = spaso.Substring(0, 4);
                        //int iyfecpago       = Convert.ToInt16(spaso);
                        //Trace.Write("297>>>>>>>>>>>>>>");
                        if (irecof > 0)
                        {
                            //if (ifecpag > 20131231) 20200127 20211231
                            if (ifecpag > 20221231)
                            {
                                ifbajax = 99999;
                            }
                        }
                        //if (iyfecpago < iyade)//si ya esta pagado no genera ese año SI es año actual sigenera adeudo                        
                        //{
                        //    if (iyfecpago > 0)
                        //    {
                        //        ifbajax = 99999;
                        //    }
                        //}
                        if (ifbajax != 0)
                        {
                            stipoanuncio = "xx";
                        }
                        if (iyade < iyini) //Evita generar adeudos anteriores a la fecha de inicio del anuncio
                        {
                            stipoanuncio = "xx";
                        }
                        if (stipoanuncio == "AP")
                        {
                            dconstancia = gdcuota;
                            dlicencia = 0m;
                        }
                        if (stipoanuncio == "PR")
                        {
                            if (darea < 13m)
                            {
                                dconstancia = gdcuota;
                                dlicencia = 0m;
                            }
                        }
                        if (stipoanuncio == "PR")
                        {
                            if (darea > 12m)
                            {
                                dlicencia = decimal.Multiply(darea, 2.5m);

                                if (dlicencia > 50m)
                                {
                                    darea = 50m;
                                }
                                if (dlicencia >= 2.5m)
                                {
                                    if (dlicencia < 51m)
                                    {
                                        darea = dlicencia;
                                    }
                                }

                                dlicencia = decimal.Multiply(decimal.Multiply(darea, dvistas), gdcuota);
                                dconstancia = 0m;
                            }

                        }
                        int ipasoaj = 0;
                        //Trace.Write("358>>>>>>>>>>>>>>");
                        if (stipoanuncio == "AJ")
                        {
                            ipasoaj = 1;
                        }
                        if (stipoanuncio == "AA")
                        {
                            ipasoaj = 1;
                        }
                        if (ipasoaj == 1)
                        {

                            dlicencia = decimal.Multiply(darea, 2.5m);
                            if (dlicencia > 50m)
                            {
                                darea = 50m;
                            }
                            if (dlicencia <= 2.5m)
                            {
                                darea = 2.5m;
                            }
                            if (dlicencia > 2.5m)
                            {
                                if (dlicencia < 51m)
                                {
                                    darea = dlicencia;
                                }
                            }

                            dlicencia = decimal.Multiply(decimal.Multiply(darea, dvistas), gdcuota);
                            dconstancia = 0m;
                        }
                        //Trace.Write("390>>>>>>>>>>>>>>");
                        if (stipoanuncio == "TE")
                        {
                            decimal ddiast = Convert.ToDecimal(arow["dias"].ToString());
                            decimal dnum_anun = Convert.ToDecimal(arow["num_anun_temp"].ToString());
                            //dlicencia = decimal.Multiply(decimal.Multiply(darea, ddiast), decimal.Multiply(64.76m, .40m));//20130101
                            //dlicencia = decimal.Multiply(decimal.Multiply(darea, ddiast), decimal.Multiply(67.29m, .40m));//20140101
                            //dlicencia = decimal.Multiply(decimal.Multiply(darea, ddiast), decimal.Multiply(70.10m, .40m));//20151120
                            //dlicencia = decimal.Multiply(decimal.Multiply(darea, ddiast), decimal.Multiply(73.04m, .40m));//20151120
                            //dlicencia = decimal.Multiply(decimal.Multiply(darea, ddiast), decimal.Multiply(75.49m, .40m));//20151120

                            //dlicencia = decimal.Multiply(decimal.Multiply(darea, ddiast), decimal.Multiply(86.88m, .40m));//20180201
                            //dlicencia = decimal.Multiply(decimal.Multiply(darea, ddiast), decimal.Multiply(89.62m, .40m));//20210819
                            dlicencia = decimal.Multiply(decimal.Multiply(darea, ddiast), decimal.Multiply(103.74m, .40m));//20220201
                            dlicencia = decimal.Multiply(dlicencia, dnum_anun);
                            dconstancia = 0m;
                            syade05 = "000000";
                            syade04 = "000000";
                            dbonrec = 0m;
                            dbonsan = 0m;
                            if (ifecpag > 0)
                            {
                                stipoanuncio = "xx";
                            }
                        }
                        if (stipoanuncio == "EL")
                        {
                            dlicencia = decimal.Multiply(darea, 2.5m);
                            if (dlicencia > 75m)
                            {
                                darea = 75m;
                            }
                            if (dlicencia < 2.5m)
                            {
                                darea = 2.5m;
                            }
                            if (dlicencia > 2.5m)
                            {
                                if (dlicencia < 75m)
                                {
                                    darea = dlicencia;
                                }
                            }
                            dlicencia = decimal.Multiply(darea, dvistas);
                            dlicencia = decimal.Multiply(dlicencia, gdcuota);
                            dconstancia = 0m;
                        }
                        //Trace.Write("424>>>>>>>>>>>>>>");              

                        if (dconstancia > 0m)
                        {
                            string spaso1 = iyade.ToString();
                            spaso1 = spaso1 + "04";
                            drezago = 0m;
                            drecargo = 0m;
                            dsancion = 0m;
                            dbonrec = 0m;
                            dbonsan = 0m;
                            dlicencia = 0m;
                        }
                        int ipasouno = 0;
                        if (stipoanuncio != "TE")
                        {
                            ipasouno = ipasouno + 1;
                        }
                        if (dconstancia == 0m)
                        {
                            ipasouno = ipasouno + 1;
                        }
                        if (stipoanuncio != "xx")
                        {
                            ipasouno = ipasouno + 1;
                        }
                        if (ipasouno == 3)
                        {
                            /////////////////////////////////////////////////////////////////////////////////////
                            //// Selecciona ANUNMRECARGO
                            /////////////////////////////////////////////////////////////////////////////////////
                            //Trace.Write("456>>>>>>>>>>>>>>");

                            DSAde dstm = new DSAde();


                            DSAdeTableAdapters.DTanunmrecargoTableAdapter tatm = new DSAdeTableAdapters.DTanunmrecargoTableAdapter();

                            tatm.Faniotasa(dstm.DTanunmrecargo, syade);

                            gdtasam = Convert.ToDecimal(dstm.DTanunmrecargo.Rows[0]["tasamensual"].ToString());

                            //20202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020
                            if (dyade1 < gdañohoy)
                            {
                                d_meses_acum = ((gdañohoy - dyade1) * 12) - 3 + gdmeshoy;
                                drecargo =decimal.Multiply(d_meses_acum, decimal.Multiply(dlicencia,(decimal.Divide( gdtasam, 10000m))));
                                //20200728  
                                //Se anularon todos los drecargo de aqui en adelante 

                            }
                            if (dyade1 == gdañohoy)
                            {
                               //  20230201 NO calcula recargos para el 2023 falta limitarlo para que del 2022 para atras si 
                               //  20230405 Se reactivo
                               if (gdmeshoy >= 4)
                               {
                                   d_meses_acum = ((gdañohoy - dyade1) * 12) - 3 + gdmeshoy;
                                   drecargo = decimal.Multiply(d_meses_acum, decimal.Multiply(dlicencia, (decimal.Divide(gdtasam, 10000m))));
                                   //aquivoy 20200728  
                                   //anular todos los drecargos de aqui en adelante 
                               }
                            }


                            //20202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020

                            if (dyade1 < gdañohoy)
                            {
                                d_meses_acum = 12m;

                                if (dyade1 == 1996m)
                                {
                                    d_meses_acum = d_meses_acum - 7m;
                                }
                                if (dyade1 != 1996m)
                                {
                                    d_meses_acum = d_meses_acum - 3m;
                                }
                                decimal dtasa_por = decimal.Multiply(d_meses_acum, gdtasam);
                                dacum_tasa = dacum_tasa + dtasa_por;
                                dyade1 = dyade1 + 1;
                                iyade1 = iyade1 + 1;
                            }
                        }
                        //Trace.Write("480>>>>>>>>>>>>>>");
                        decimal dacum_tasa2 = 0m;
                        int ipaso482 = 0;
                        if (dconstancia > 0m)
                        {
                            ipaso482 = 2;//20090402
                        }

                        if (stipoanuncio == "xx")//20090402
                        {
                            ipaso482 = 2;
                        }
                        if (stipoanuncio == "TE")
                        {
                            ipaso482 = 2;
                        }
                        if (ipaso482 != 2)
                        {

                            //// Selecciona ANUNMRECARGO //////////////////////////////////
                            DSAde dstmw = new DSAde();
                            DSAdeTableAdapters.DTanunmrecargoTableAdapter tatmw = new DSAdeTableAdapters.DTanunmrecargoTableAdapter();

                            do
                            {
                                //Trace.Write("494>>>>>>>>>>>>>>");
                                if (dyade1 != gdañohoy)
                                {
                                    decimal dtasa_por = 0m;
                                    string syade1 = Convert.ToString(dyade1);
                                    //// Selecciona ANUNMRECARGO
                                    tatmw.Faniotasa(dstmw.DTanunmrecargo, syade1);

                                    decimal dtasap = Convert.ToDecimal(dstmw.DTanunmrecargo.Rows[0]["tasamensual"].ToString());
                                    decimal dtasamensual = dtasap;
                                    dtasa_por = decimal.Multiply(dtasamensual, 12m);
                                    dacum_tasa = dacum_tasa + dtasa_por;
                                    d_meses_acum = d_meses_acum + 12;
                                    dyade1 = dyade1 + 1;
                                }

                            } while (dyade1 < gdañohoy);

                            //Trace.Write("511>>>>>>>>>>>>>>");
                            if (dyade1 == gdañohoy)
                            {
                                decimal dtasa_por = 0m;
                                decimal dtasamensual = 0m;
                                string syade1 = Convert.ToString(dyade1);

                                //// Selecciona ANUNMRECARGO ///////////////////////////////////
                                tatmw.Faniotasa(dstmw.DTanunmrecargo, syade1);
                                dtasamensual = Convert.ToDecimal(dstmw.DTanunmrecargo.Rows[0]["tasamensual"].ToString());
                                gdmeshoy1 = gdmeshoy;

                                if (gdmeshoy < 4m)
                                {
                                    if (gdañohoy == dyade)
                                    {
                                        dtasamensual = 0m;
                                        gdmeshoy = 0m;
                                    }
                                }
                                //Trace.Write("531>>>>>>>>>>>>>>");
                                if (gdmeshoy >= 4m)
                                {
                                    if (gdañohoy == dyade)
                                    {
                                        if (gdfechahoy == dfinicio)
                                        {
                                            gdmeshoy = gdmeshoy - 4m + 1m;
                                        }
                                    }
                                }

                                dtasa_por = decimal.Multiply(dtasamensual, gdmeshoy);
                                dacum_tasa = dacum_tasa + dtasa_por;
                                d_meses_acum = d_meses_acum + gdmeshoy;
                                gdmeshoy = gdmeshoy1;
                            }
                            if (stipoanuncio != "xx") // baja3
                            {
                                //Trace.Write("550>>>>>>>>>>>>>>");
                                dacum_tasa2 = dacum_tasa;
                                if (dyade < gdañohoy)
                                {
                                    if (dconstancia == 0m)
                                    {

                                        drezago = dlicencia;
                                       // drecargo = decimal.Multiply(decimal.Divide(dlicencia, 10000m), dacum_tasa2); 20200728
                                        dsancion = dlicencia;
                                        dlicencia = 0m;// ojo con este esta generando sancion= 0
                                    }
                                }
                                //Trace.Write("563>>>>>>>>>>>>>>");
                                if (dyade < gdañohoy) // ver que valor  es dyade aqui 20200728
                                {
                                    if (dconstancia > 0m)
                                    {
                                        drezago = dconstancia;
                                       // drecargo = decimal.Multiply(decimal.Divide(dconstancia, 10000m), dacum_tasa2); 20200728
                                        dsancion = 0m;
                                        dsancion = dconstancia;
                                        dconstancia = 0m;// ojo con este esta generando sancion= 0
                                    }
                                }
                                //Trace.Write("575>>>>>>>>>>>>>>");
                                if (dyade < gdañohoy)
                                {
                                    dsancion = dlicencia + dsancion + dconstancia;
                                }
                                if (dyade == gdañohoy)
                                {
                                    dsancion = 0m;
                                }
                                if (dyini < gdañohoy)
                                {
                                    dmini = 0m;
                                }
                                ////////////////////////////////// licencia ////////////////////////////////////
                                int ipasodos = 0;

                                //----------------------

                                if (dyade == gdañohoy)
                                {
                                    if (gdmeshoy >= 4m)
                                    {
                                        ipasodos = ipasodos + 1;
                                    }

                                    if (dmini <= 4m)//aqui es mes de finicio ok
                                    {
                                        ipasodos = ipasodos + 1;
                                    }
                                    if (dfinicio != gdfechahoy)
                                    {
                                        ipasodos = ipasodos + 1;
                                    }

                                    if (dlicencia > 0)
                                    {
                                        ipasodos = ipasodos + 1;
                                    }

                                    if (dyini == gdañohoy)
                                    {
                                        ipasodos = 0;
                                    }

                                }

                                //---------------------------



                                //if (dyade < gdañohoy) // if (dyade == gdañohoy) 20130426 error < 20130523
                                //{
                                //    ipasodos = ipasodos + 1;
                                //}

                                //ipasodos = 3;// anulo toda la rutina anterior 20130524
                                //if (dyini == gdañohoy) // anulo el if que sigue anterior 20130524
                                //{
                                //    ipasodos = 0;
                                //}

                                //if (dyini < gdañohoy)
                                //{
                                //    ipasodos = ipasodos + 1;
                                //}
                                //Trace.Write("606>>>>>>>>>>>>>>");//Instruscciones comentarizadas 


                                if (ipasodos == 4)
                                {
                                    drezago = dlicencia;
                                   // drecargo = decimal.Multiply(decimal.Divide(dlicencia, 10000m), dacum_tasa2); 20200728
                                    dsancion = dlicencia;
                                    dlicencia = 0m;
                                }
                               
                                ////////////////////////////////// constancia ////////////////////////////////////
                                int ipasotres = 0;

                                if (dyade == gdañohoy)
                                {
                                    if (gdmeshoy >= 4m)
                                    {
                                        ipasotres = ipasotres + 1;
                                    }

                                    if (dmini <= 4m)//aqui es mes de finicio ok
                                    {
                                        ipasotres = ipasotres + 1;
                                    }
                                    if (dfinicio != gdfechahoy)
                                    {
                                        ipasotres = ipasotres + 1;
                                    }

                                    if (dconstancia > 0m)
                                    {
                                        ipasotres = ipasotres + 1;
                                    }

                                    if (dyini == gdañohoy)
                                    {
                                        ipasotres = 0;
                                    }

                                }


                                //if (gdmeshoy >= 4m)
                                //{
                                //    ipasotres = ipasotres + 1;
                                //}
                                //if (dmini <= 4m)// aqui es mes de finicio ok
                                //{
                                //    ipasotres = ipasotres + 1;
                                //}
                                //if (dyade < gdañohoy)// if (dyade == gdañohoy) 20130426 20130523 revisado ok 
                                //{
                                //    ipasotres = ipasotres + 1;
                                //}
                                //if (dconstancia > 0m)
                                //{
                                //    ipasotres = ipasotres + 1;
                                //}

                                //ipasotres = 3;// anulo toda la rutina anterior 20130524

                                //if (dyini == gdañohoy)// anulo el if que sigue anterior 20130524
                                //{
                                //    ipasotres = 0;
                                //}
                                //if (dyini < gdañohoy)
                                //{
                                //    ipasotres = ipasotres + 1;
                                //}
                                //Trace.Write("632>>>>>>>>>>>>>>");//Instrucciones anuladas comentarizadas ??
                                if (ipasotres == 4)
                                {
                                    drezago = dconstancia;
                                    drecargo = decimal.Multiply(decimal.Divide(dconstancia, 10000m), dacum_tasa2);
                                    dsancion = dconstancia;
                                    dconstancia = 0m;
                                    int ver1 = Convert.ToInt32(drecargo);
                                }
                                ////////////////////////////////// bonificacion ////////////////////////////////////
                                if (gdfechahoy != dfinicio)
                                {
                                    //dbonrec
                                    //dbonsan
                                }
                                if (gdfechahoy == dfinicio)
                                {
                                    dbonrec = 0m;
                                    dbonsan = 0m;
                                }
                            }//baja 3

                        }//Temporales No 03/03/2006	 
                        dacum_tasa = 0m;
                        dacum_tasa2 = 0m;
                        //Trace.Write("658>>>>>>>>>>>>>>");
                        if (stipoanuncio == "xx" )
                        {
                            //Trace.Write("661>>>>>>>>>>>>>>");
                            dlicencia = 0m;
                            drezago = 0m;
                            drecargo = 0m;
                            dsancion = 0m;
                            dconstancia = 0m;
                            dbonrec = 0m;
                            dbonsan = 0m;
                        }

                        // 20230405 se desactivo la condicion
                        //if (  syade == "2023") // 20230201 
                        //{
                        //    //Trace.Write("661>>>>>>>>>>>>>>");
                        //  
                        //    drecargo = 0m;
                        //    dbonrec = 0m;
                        //   
                        //}
                        //// Selecciona ANUNDANUNCIOS //////////////////////////////////////
                        //Trace.Write("673>>>>>>>>>>>>>>");
                        DSAde dstades = new DSAde();
                        DSAdeTableAdapters.DTAdeudosTableAdapter taade = new DSAdeTableAdapters.DTAdeudosTableAdapter();
                        taade.FCtaFa(dstades.DTAdeudos, scuenta, syade04);

                        int irows = dstades.DTAdeudos.Count();
                        int ipaso4 = 0;// aqui clavate <<<<<<<<<<<<<<<<<
                        if (irows == 0)
                        {
                            ipaso4 = ipaso4 + 1;
                        }
                        if (syade04 != "000004")
                        {
                            ipaso4 = ipaso4 + 1;
                        }
                        if (stipoanuncio != "xx")
                        {
                            ipaso4 = ipaso4 + 1;
                        }
                        if (stipoanuncio == "xx")//20090420
                        {
                            ipaso4 = ipaso4 + 5;
                        }
                        ///////////////////////// MUEVE a danundadeudos ////////////////////////////////////////////////////////////
                        if (dlicencia == 0m)
                        {
                            if (dconstancia > 0m)
                            {
                                drezago = 0m;
                                drecargo = 0m;
                                dsancion = 0m;
                                //if (dconstancia == 64.76m)//20130101
                                //{
                                //    dconstancia = 65.00m;//20130101
                                //}
                                //if (dconstancia == 67.29m)//20140101
                                //{
                                //    dconstancia = 67.00m;//20140101
                                //}
                                //if (dconstancia == 70.10m)//20140101
                                //{
                                //    dconstancia = 70.00m;//20140101
                                //}
                                //if (dconstancia == 73.04m)//20160101
                                //{
                                //    dconstancia = 73.00m;//20160101
                                //}
                                //if (dconstancia == 75.49m)//20170101
                                //{
                                //    dconstancia = 75.00m;//20170101
                                //}

                                dconstancia = dconstancia * 1.40m; //mod 20200918
                                dconstancia = Math.Round(dconstancia);// mod 20200918

                                //if (dconstancia == 86.88m)//20170214 VALOR DE LA CONSTANCIA * 1.40 20200202
                                //{
                                //    dconstancia = 122.00m;//20170214 20200202
                                //}

                                //if (dconstancia == 84.49m)//20170214 VALOR DE LA CONSTANCIA * 1.40 20200202
                                //{
                                //    dconstancia = 118.00m;//20170214 20200202
                                //}
                            }
                        }
                        // Si es del año no cobra accesorios 20130419// 
                        if (dyini == gdañohoy)
                        {
                            drezago = 0m;
                            drecargo = 0m;
                            dsancion = 0m;
                        }
                        ///////////////////////////////////////////////
                        string sph = DateTime.Now.Hour.ToString();
                        string spm = DateTime.Now.Minute.ToString();
                        gshorahoy = sph + ":" + spm;


                        //  scuenta 
                        //  gsDUA 
                        //  gsSubDUA 
                        //  syade04 
                        dlicencia = decimal.Round(dlicencia, 0);
                        double ddlicencia = Convert.ToDouble(dlicencia);
                        double ddrezago = Convert.ToDouble(drezago);
                        drecargo = decimal.Round(drecargo, 0);
                        double ddrecargo = Convert.ToDouble(drecargo);
                        double ddsancion = Convert.ToDouble(dsancion);
                        dconstancia = decimal.Round(dconstancia, 0);
                        double ddconstancia = Convert.ToDouble(dconstancia);
                        double ddbonvalref = 0;
                        double ddbonrez = 0;
                        double ddbonrec = Convert.ToDouble(dbonrec);
                        double ddbonsan = Convert.ToDouble(dbonsan);
                        double ddbonconst = 0;
                        //  gsfechahoy
                        //  gshorahoy 
                        //  gsUser 

                        //// INSERT  al danundadeudos///////////////////////////////
                        //Trace.Write("715>>>>>>>>>>>>>>");
                        if (ipaso4 == 3)
                        {
                            DSAde dsains = new DSAde();
                            DSAdeTableAdapters.DTAdeudosTableAdapter taia = new DSAdeTableAdapters.DTAdeudosTableAdapter();

                            taia.IQAdeudos(scuenta, gsDUA, gsSubDUA, syade04, ddlicencia, ddrezago, ddrecargo, ddsancion, 0, ddconstancia, ddbonvalref, ddbonrez, ddbonrec, ddbonsan, 0, 0, gsfechahoy, gshorahoy, gsUser);
                        }
                        //////////////////////////////////////////////////////////////////////////
                        //// UPDATE   al danundadeudos
                        /////////////////////////////////////////////////////////////////////////              
                        //  //Trace.Write("726>>>>>>>>>>>>>>");
                        //  if (ipaso4 != 3)  20090420
                        if (ipaso4 < 3)
                        {
                            DSAde dsaupd = new DSAde();
                            DSAdeTableAdapters.DTAdeudosTableAdapter taua = new DSAdeTableAdapters.DTAdeudosTableAdapter();

                            taua.UQAdeudos(ddlicencia, ddrezago, ddrecargo, ddsancion, 0, ddconstancia, ddbonvalref, ddbonrez, ddbonrec, ddbonsan, ddbonconst, 0, gsfechahoy, gshorahoy, gsUser, gsDUA, gsSubDUA, scuenta, syade04);
                        }

                    }


                    GVAdeudos.Visible = true;
                    //FVAdeudos.Visible = true;
                    panel1.Visible = true;
                    panel2.Visible = true;

                    //GVAdeudos.
                    lTAfecharbocap.Visible = true;
                    lTAnombrecap.Visible = true;
                    lTAUltimoRbo.Visible = true;
                    lTAUltimoañopagado.Visible = true;
                    lTA1.Visible = true;
                    lTA2.Visible = true;
                    lTA3.Visible = true;
                    lTA4.Visible = true;
                    lTAUltimoRbo.Text = TBRecibo.Text;
                    lTAUltimoañopagado.Text = sypag;
                    lTAnombrecap.Text = LReciboNombre.Text;
                    lTAfecharbocap.Text = TBFechaRecibo.Text;
                    //HLROP.Visible = true;
                    BImprimeOP.Visible = true;

                    if (gsfechacap != gsfechahoy)
                    {
                        LoginInfo.sFCAP = this.TBFechaRecibo.Text;
                        LoginInfo.sRBOCAP = "N/A";
                        LoginInfo.sNCAP = "ALTA";
                        LoginInfo.sYADE = "N/A";
                    }
                    if (gsfechacap != gsfechahoy)
                    {
                        LoginInfo.sFCAP = TBFechaRecibo.Text;
                        LoginInfo.sRBOCAP = TBRecibo.Text;
                        LoginInfo.sNCAP = LReciboNombre.Text;
                        LoginInfo.sYADE = LBAñopagado.SelectedItem.ToString();
                        if (gsfechacap == "19010101") //20200520
                        {
                            LoginInfo.sYADE = " ";//20200520
                            LoginInfo.sFCAP = " ";//20200520
                        }
                    }

                }
            }
            catch (Exception ex)
            {
                string sEx = ex.Message.ToString();
                MessageBox.Show("Mensaje de Error: " + sEx);
            }

        }