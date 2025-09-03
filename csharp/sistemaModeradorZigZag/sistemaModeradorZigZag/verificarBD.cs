using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace sistemaModeradorZigZag
{
    internal class verificarBD
    {
        private MySqlConnection conexao;

        public verificarBD()
        {
            conexao = new MySqlConnection("Persist Security Info=false; server=localhost; database=bd_zigzag_main; uid=root");
        }

        public void verificaUsuario(string tipoDeUsuario, string id, string verificado) 
        {
            try
            {
                conexao.Open();
                MySqlCommand cmd = conexao.CreateCommand();


                switch (tipoDeUsuario)
                {
                    case "costureiro":

                        cmd.CommandText = "UPDATE tbl_costureiro SET cos_verificado=@ver WHERE cos_id=@id";
                        cmd.Parameters.AddWithValue("@ver", verificado);
                        cmd.Parameters.AddWithValue("@id", id);

                        cmd.ExecuteNonQuery();

                        break;

                    case "entregador":

                        cmd.CommandText = "UPDATE tbl_entregador SET entgd_verificado=@ver WHERE entgd_id=@id";
                        cmd.Parameters.AddWithValue("@ver", verificado);
                        cmd.Parameters.AddWithValue("@id", id);

                        cmd.ExecuteNonQuery();

                        break;
                }
            }
            catch (Exception ex)
            {
                throw new ApplicationException(ex.ToString());
            }
            finally
            {
                conexao.Close();
            }

        }

    }
}
