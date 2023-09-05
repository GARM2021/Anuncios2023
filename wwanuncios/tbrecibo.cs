   Lerror_captura.Visible = false;
                string sfechaing = TBFechaRecibo.Text;
                string srboing = TBRecibo.Text;

                int ifecharecibo = int.Parse(sfechaing);

                if (ifecharecibo > 19010101)
                {

                    //// Selecciona  DINGRESOS
                    ////////////////////////////////////////////////////////////////////////////////
                    DSIng dsing = new DSIng();
                    DSIngTableAdapters.DTIngTableAdapter taing = new DSIngTableAdapters.DTIngTableAdapter();
                    taing.FIng(dsing.DTIng, sfechaing, srboing);

                    int irowsi = dsing.DTIng.Count();
                    if (irowsi > 0)
                    {
                        LReciboNombre.Text = dsing.DTIng.Rows[0]["nombre"].ToString();
                        LBAñoGenerado.Visible = true;
                        LReciboNombre.Visible = true;

                    }

                    if (irowsi == 0)
                    {
                        Lerror_captura.Text = "RECIBO NO VALIDO";
                        Lerror_captura.Visible = true;
                        LBAñoGenerado.Visible = false;
                        LReciboNombre.Text = " ";
                        LReciboNombre.Visible = false;
                        BGeneraAdeudos.Visible = false;
                        LBAñoGenerado.Visible = false;

                    }
                }