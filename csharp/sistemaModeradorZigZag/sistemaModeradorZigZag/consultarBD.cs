using MySql.Data.MySqlClient;
using MySqlX.XDevAPI;
using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Common;
using System.Drawing;
using System.Linq;
using System.Security.Cryptography;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace sistemaModeradorZigZag
{

    internal class consultarBD
    {
        private MySqlConnection conexao;
        public consultarBD()
        {
            conexao = new MySqlConnection("Persist Security Info=false; server=localhost; database=bd_zigzag_main; uid=root");
        }

        public DataSet GetTodosDados(string tipoDeUsuario)
        {
            MySqlCommand query = conexao.CreateCommand();
            MySqlDataAdapter dataAdapter;
            DataSet conjuntoDeDados;
            conjuntoDeDados = new DataSet();

            conexao.Open();

            try
            {
                switch (tipoDeUsuario)
                {
                    case "costureiro":
                        query.CommandText = "SELECT * FROM tbl_costureiro"; //REMOVER O CAMPO DA SENHA (TIRAR *)

                        query = new MySqlCommand(query.CommandText, conexao);
                        dataAdapter = new MySqlDataAdapter(query);
                        dataAdapter.Fill(conjuntoDeDados, "dados");
                        return conjuntoDeDados;

                    case "entregador":
                        query.CommandText = "SELECT * FROM tbl_entregador";

                        query = new MySqlCommand(query.CommandText, conexao);
                        dataAdapter = new MySqlDataAdapter(query);
                        dataAdapter.Fill(conjuntoDeDados, "dados");
                        return conjuntoDeDados;
                    default:
                        return null;
                }
            }
            catch (MySqlException ex)
            {
                throw new ApplicationException(ex.ToString());
                
            }
            finally
            {
                conexao.Close();
            }
        }

        public string GetNumeroUsuarios(string tipoDeUsuario, string verificado) 
        {
            conexao.Open();
            MySqlCommand query = conexao.CreateCommand();
            tipoDeUsuario += verificado;
            MySqlDataReader leitorDeDados;
            string numero = null;

            try
            {
                switch (tipoDeUsuario)
                {
                    case "costureiro0":
                        query.CommandText = "SELECT COUNT(cos_id) AS quantidade FROM tbl_costureiro WHERE cos_verificado = 0";
                        leitorDeDados = query.ExecuteReader();

                        query = new MySqlCommand(query.CommandText, conexao);

                        while (leitorDeDados.Read())
                        {
                            numero = leitorDeDados["quantidade"].ToString();
                        }
                        leitorDeDados.Close();

                        return numero;

                    case "costureiro1":
                        query.CommandText = "SELECT COUNT(cos_id) AS quantidade FROM tbl_costureiro WHERE cos_verificado = 1";
                        leitorDeDados = query.ExecuteReader();

                        query = new MySqlCommand(query.CommandText, conexao);

                        while (leitorDeDados.Read())
                        {
                            numero = leitorDeDados["quantidade"].ToString();
                        }
                        leitorDeDados.Close();

                        return numero;

                    case "entregador0":
                        query.CommandText = "SELECT COUNT(entgd_id) AS quantidade FROM tbl_entregador WHERE entgd_verificado = 0";
                        leitorDeDados = query.ExecuteReader();

                        query = new MySqlCommand(query.CommandText, conexao);

                        while (leitorDeDados.Read())
                        {
                            numero = leitorDeDados["quantidade"].ToString();
                        }
                        leitorDeDados.Close();

                        return numero;

                    case "entregador1":
                        query.CommandText = "SELECT COUNT(entgd_id) AS quantidade FROM tbl_entregador WHERE entgd_verificado = 1";
                        leitorDeDados = query.ExecuteReader();

                        query = new MySqlCommand(query.CommandText, conexao);

                        while (leitorDeDados.Read())
                        {
                            numero = leitorDeDados["quantidade"].ToString();
                        }
                        leitorDeDados.Close();

                        return numero;

                    default:
                        return null;
                }
            }
            catch (MySqlException ex)
            {
                throw new ApplicationException(ex.ToString());

            }
            finally
            {
                conexao.Close();
            }
        }

        public costureiro GetCostureiro(string tipoDeUsuario, int id)
        {
            conexao.Open();
            try
            {
                
                
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
