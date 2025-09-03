using MySql.Data.MySqlClient;
using MySqlX.XDevAPI;
using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Common;
using System.Drawing;
using System.Linq;
using System.Runtime.ConstrainedExecution;
using System.Security.Cryptography;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using static System.Windows.Forms.VisualStyles.VisualStyleElement.ListView;

namespace sistemaModeradorZigZag
{

    internal class consultarBD
    {
        private MySqlConnection conexao;
        public DataSet conjuntoDeDados;
        public consultarBD()
        {
            conexao = new MySqlConnection("Persist Security Info=false; server=localhost; database=bd_zigzag_main; uid=root");
        }

        public DataSet GetTodosDados(string tipoDeUsuario)
        {
            MySqlCommand query = conexao.CreateCommand();
            MySqlDataAdapter dataAdapter;
            conjuntoDeDados = new DataSet();

            conexao.Open();

            try
            {
                switch (tipoDeUsuario)
                {
                    case "costureiro":
                        query.CommandText = "SELECT cos_id,cos_email,cos_nome,cos_cpf,cos_cnpj,cos_verificado, " +
                            "cos_rua,cos_bairro,cos_numero,cos_complemento,cos_cidade,cos_estado,cos_cep " +
                            "FROM tbl_costureiro";

                        dataAdapter = new MySqlDataAdapter(query);
                        dataAdapter.Fill(conjuntoDeDados, "dados");
                        break;

                    case "entregador":
                        query.CommandText = "SELECT entgd_id,entgd_email,entgd_nome,entgd_cnh,entgd_cpf,entgd_telefone,entgd_verificado " +
                            "FROM tbl_entregador";

                        dataAdapter = new MySqlDataAdapter(query);
                        dataAdapter.Fill(conjuntoDeDados, "dados");
                        break;
                }
                return conjuntoDeDados;
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

        public string GetNumeroUsuarios(string tipoDeUsuario, int verificado) 
        {
            conexao.Open();
            MySqlCommand query = conexao.CreateCommand();
            MySqlDataReader leitorDeDados;
            string numero = null;

            try
            {
                switch (tipoDeUsuario)
                {
                    case "costureiro":
                        query.CommandText = "SELECT COUNT(cos_id) AS quantidade FROM tbl_costureiro WHERE cos_verificado = @ver";
                        query.Parameters.AddWithValue("@ver", verificado);

                        leitorDeDados = query.ExecuteReader();

                        while (leitorDeDados.Read())
                        {
                            numero = leitorDeDados["quantidade"].ToString();
                        }
                        leitorDeDados.Close();

                        break;

                    case "entregador":
                        query.CommandText = "SELECT COUNT(entgd_id) AS quantidade FROM tbl_entregador WHERE entgd_verificado = @ver";
                        query.Parameters.AddWithValue("@ver", verificado);

                        leitorDeDados = query.ExecuteReader();

                        while (leitorDeDados.Read())
                        {
                            numero = leitorDeDados["quantidade"].ToString();
                        }
                        leitorDeDados.Close();

                        break;

                }
                return numero;
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

        public string[] carregarIdComboBox(string tipoDeUsuario)
        {
            try
            {
                conexao.Open();
                MySqlCommand query = conexao.CreateCommand();
                MySqlDataReader leitorDeDados = null;

                List<string> listaID = new List<string>();


                switch (tipoDeUsuario)
                {
                    case "costureiro":
                        query.CommandText = "SELECT cos_id FROM tbl_costureiro WHERE cos_verificado = 0";
                        leitorDeDados = query.ExecuteReader();


                        while (leitorDeDados.Read())
                        {
                            listaID.Add(leitorDeDados["cos_id"].ToString());
                        }
                        leitorDeDados.Close();

                        break;

                    case "entregador":

                        query.CommandText = "SELECT entgd_id FROM tbl_entregador WHERE entgd_verificado = 0";
                        leitorDeDados = query.ExecuteReader();

                        while (leitorDeDados.Read())
                        {

                            listaID.Add(leitorDeDados["entgd_id"].ToString());
                        }
                        leitorDeDados.Close();

                        break;
                }

                return listaID.ToArray();
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

        public costureiro GetCostureiro(int id)
        {
            conexao.Open();
            try
            {
                MySqlCommand query = conexao.CreateCommand();
                MySqlDataReader leitorDeDados;

                query.CommandText = "SELECT cos_id,cos_email,cos_nome,cos_cpf,cos_cnpj,cos_verificado," +
                            "cos_rua,cos_bairro,cos_numero,cos_complemento,cos_cidade,cos_estado,cos_cep " +
                            "FROM tbl_costureiro " +
                            "WHERE cos_id = @id";
                query.Parameters.AddWithValue("@id", id);

                costureiro costureiroSelecionado = new costureiro();

                leitorDeDados = query.ExecuteReader(CommandBehavior.CloseConnection);

                leitorDeDados.Read();

                costureiroSelecionado.CostureiroID = Convert.ToInt32(leitorDeDados["cos_id"]);
                costureiroSelecionado.Email = leitorDeDados["cos_email"].ToString();
                costureiroSelecionado.Nome = leitorDeDados["cos_nome"].ToString();
                costureiroSelecionado.CPF = Convert.ToInt64(leitorDeDados["cos_cpf"]);
                costureiroSelecionado.CNPJ = Convert.ToInt64(leitorDeDados["cos_cnpj"]);
                costureiroSelecionado.Verificado = Convert.ToInt32(leitorDeDados["cos_verificado"]);
                costureiroSelecionado.Rua = leitorDeDados["cos_rua"].ToString();
                costureiroSelecionado.Bairro = leitorDeDados["cos_bairro"].ToString();
                costureiroSelecionado.Numero = Convert.ToInt64(leitorDeDados["cos_numero"]);
                costureiroSelecionado.Complemento = leitorDeDados["cos_complemento"].ToString();
                costureiroSelecionado.Cidade = leitorDeDados["cos_cidade"].ToString();
                costureiroSelecionado.Estado = leitorDeDados["cos_estado"].ToString();
                costureiroSelecionado.CEP = Convert.ToInt32(leitorDeDados["cos_cep"]);

                return costureiroSelecionado;

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
        public entregador GetEntregador(int id)
        {
            conexao.Open();
            try
            {
                MySqlCommand query = conexao.CreateCommand();
                MySqlDataReader leitorDeDados;

                query.CommandText = "SELECT entgd_id,entgd_email,entgd_nome,entgd_cnh,entgd_cpf,entgd_telefone,entgd_verificado " +
                            "FROM tbl_entregador " +
                            "WHERE entgd_id = @id";
                query.Parameters.AddWithValue("@id", id);

                entregador entregadorSelecionado = new entregador();

                leitorDeDados = query.ExecuteReader(CommandBehavior.CloseConnection);

                leitorDeDados.Read();

                entregadorSelecionado.EntregadorID = Convert.ToInt32(leitorDeDados["entgd_id"]);
                entregadorSelecionado.Email = leitorDeDados["entgd_email"].ToString();
                entregadorSelecionado.Nome = leitorDeDados["entgd_nome"].ToString();
                entregadorSelecionado.CNH = Convert.ToInt64(leitorDeDados["entgd_cnh"]);
                entregadorSelecionado.CPF = Convert.ToInt64(leitorDeDados["entgd_cpf"]);
                entregadorSelecionado.Telefone = Convert.ToInt64(leitorDeDados["entgd_telefone"]);
                entregadorSelecionado.Verificado = Convert.ToInt32(leitorDeDados["entgd_verificado"]);

                return entregadorSelecionado;

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
